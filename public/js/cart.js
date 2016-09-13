(function($, document, window, undefined) {
  $(document).on("ready", function() {
    $(".add-to-cart").on("click", function(){
      $.ajax({
        url,
        data
      })
    })
  }).on("shown.bs.modal", function(){
    id=$(this).data("id");
    price=$(this).data("price");
    $('#id').val(id);
    $('#price').val(price);
  });
})(jQuery, document, window);
