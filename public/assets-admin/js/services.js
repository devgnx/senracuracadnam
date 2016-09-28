(function($, window, document, undefined) {
  $('.iconpicker').on('change', function(e) {
    var dataTarget = $(this).data('target');

    if ( $(dataTarget).length ) {
      $( dataTarget ).val( e.icon );
    }
  });
})(jQuery, window, document)
