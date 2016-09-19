(function($, document, window, undefined) {

  var cart = {
    viewCart:  '#view-cart',
    addToCart: '#add-to-cart',
    addToCartForm: '#add-to-cart-form',
    $loader: (function() {
      var $modalContent = $('<div class="modal-body"></div>');
      var $container    = $('<div class="text-center" style="font-size: 80px; margin: 100px;"></div>');

      return $container
        .append('<i class="fa fa-pulse fa-spinner"></i>')
        .appendTo($modalContent);
    })()
  };

  $(document).on("submit", "#add-to-cart-form", function(e) {
    e.preventDefault();

    $.ajax({
      url: this.action,
      type: this.method,
      data: $(this).serialize()
    })
    .done(function(result) {
      $(document).trigger('added.item.cart');
      $(cart.addToCart).html(result);
    });

    return false;

  }).on("click", ".remove-item", function(e) {
    e.preventDefault();

    $(this).parents(".modal").load( $(this).attr('href') );
    $(document).trigger('removed.item.cart');

    return false;

  }).on("added-cart-form", function(e) {
    var relatedTarget;

    if (typeof e === 'object' && e.hasOwnProperty('relatedTarget')) {
      var id    = $( e.relatedTarget ).data("id");
      var price = $( e.relatedTarget ).data("price");

      $('#id').val(id);
      $('#price').val(price);
    }
  }).on("shown.bs.modal", cart.addToCart+','+cart.viewCart, function() {
    var $this = $(this);
    $(document).ajaxSend(function(event, xhr, settings) {
      $this.find('.modal-content').html(cart.$loader);
    });
  }).on("shown.bs.modal", cart.addToCart, function(modalEvent) {
    $(document).ajaxComplete(function() {
      var e = $.Event('added-cart-form', {
        relatedTarget: modalEvent.relatedTarget
      });

      $(document).trigger(e);
    });

  }).on("shown.bs.modal", cart.viewCart, function() {
    var $modal = $(this);

    var fixModalHeight = function() {
      var $container   = $modal.find('.cart-list-container');
      var $modalFooter = $modal.find('.modal-footer');
      var offset = $container.offset().top + $modalFooter.height();
      $container.height($(window).height() - offset - 170);
    };

    fixModalHeight();
    $(document).ajaxComplete(fixModalHeight);

  }).on('hidden.bs.modal', function () {
    $('#view-cart').removeData('bs.modal');
    $('#add-to-cart-form').removeData('bs.modal');

  }).on("click", ".open-add-to-cart:not([href])", function() {
    var e = $.Event('added-cart-form');

    $(document).trigger($.extend(e, {relatedTarget: this}));
    $('.open-add-to-cart').attr('href', $(this).data('href'));

  }).on("added.item.cart", function() {
    $.ajax({
      url: urlManager.cart.count,
      type: 'get'
    })
    .done(function(total) {
      $('.cart-item-count').text( total );
    });

  }).on("removed.item.cart", function() {
    var $itemCount = $('.cart-item-count');
    $itemCount.text($itemCount.text() -1);
  });
})(jQuery, document, window);
