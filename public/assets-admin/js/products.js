(function($, document, window, undefined) {
  $(document).on('ready', function() {
    $('.form-price').maskMoney({
      thousands: ".",
      decimal: ","
    });
  });
})(jQuery, document, window);
