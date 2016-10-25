(function($, document, window, undefined) {
  $(document).on('ready', function() {
    $('.status').on('change', function() {
      $.ajax({
        url: getSaveStatusUtl().replace('order.id', $(this).data('id')),
        data: {
          id: $(this).data('id'),
          status: $(this).val()
        },
        type: 'post',
        dataType: 'json'
      }).fail(function() {
        alert("Não foi possível salvar o status");
      }).done(function(data) {
        if (data.success) {
          window.location = data.redirect;
        }
      });
    });
  });
})(jQuery, document, window);
