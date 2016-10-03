(function($, document, window, undefined) {
  $(document).on('ready', function() {
    $('.form-price').maskMoney({
      thousands: ".",
      decimal: ","
    });
  }).on('click', '#new-category button[type="submit"]', function() {
    $('#new-category form').submit();
  }).on('submit', '#new-category form', function(e) {
    e.preventDefault();
    $.post(this.action, $(this).serialize()).done(function(data) {
      if (!data) return;
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
      $('#new-category').modal('hide');
    });
    return false;
  }).on('hidden.bs.modal', '#new-category', function() {
    $(this).find('form').get(0).reset();
  });
})(jQuery, document, window);
