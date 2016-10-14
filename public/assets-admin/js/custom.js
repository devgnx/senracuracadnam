(function($, document, window, undefined) {
  $(document).on('click', '.load-image-viewer', function() {
    var imgSrc = $(this).children().attr('src');
    $('#image-viewer').find('img').attr('src', imgSrc);
  });
})(jQuery, document, window);
