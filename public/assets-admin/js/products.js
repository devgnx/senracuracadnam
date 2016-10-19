(function($, document, window, undefined) {
  $(document).on('ready', function() {
    $('.form-price').maskMoney({
      thousands: ".",
      decimal: ","
    });

  }).on('added.category', function(data) {
    var $category = $('#category').html('');

    $.each(data, function(key, category) {
      $('<option></option>')
        .val(category.value)
        .text(category.label)
        .attr('selected', category.selected)
        .appendTo($category);
    });

    $('#new-category-trigger').hide();
    $('#category-list').show();
    $('#category-form-modal').modal('hide');
  });
})(jQuery, document, window);
