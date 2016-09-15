(function($, document, window, undefined) {
  $(document).on("submit", "#add-to-cart-form", function(e) {
    e.preventDefault();

    $.ajax({
      url: this.action,
      type: this.method,
      data: $(this).serialize()
    }).done(function(result) {
      $(document).trigger('added.item.cart');
      $("#add-to-cart").html(result);
    });

    return false;

  }).on("click", ".remove-item", function(e) {
    e.preventDefault();
    $(this).parents(".modal").load( $(this).attr('href') );
    $(document).trigger('added.item.cart');
    return false;

  }).on("shown.bs.modal", "#add-to-cart", function(e) {
    var id    = $(e.relatedTarget).data("id");
    var price = $(e.relatedTarget).data("price");

    $('#id').val(id);
    $('#price').val(price);

  }).on('hidden.bs.modal', function () {
    $('#view-cart').removeData('bs.modal');
    $('#add-to-cart-form').removeData('bs.modal');

  }).on("added.item.cart", function() {
    $.ajax({
      url: urlManager.cart.count,
      type: 'get'
    }).done(function(total) {
      $('.cart-item-count').text( total );
    });
  });
})(jQuery, document, window);
