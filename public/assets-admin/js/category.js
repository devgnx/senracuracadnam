(function($, document, window, undefined) {
  var categoryAjaxConfig = {
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
  };

  var showCategoryList = function() {
    var $categoryList = $('#category-list-container');
    if ($categoryList.length) {
      $categoryList.load($(this).data('route-url')).done(function() {
        $('#category-form-container').hide();
        $categoryList.fadeIn();
      });
    }
  };

  var showCategoryForm = function() {
    $('#category-list-container').hide();
    $('#category-form-container').fadeIn();
  };

  $(document).on('click', '.edit-category', function(e) {
    e.preventDefault();

    $.ajax($.extend(categoryAjaxConfig, {
      url: this.href
    })).done(function(data) {
      if (!data) return;
      var $inputs = $('#category-modal').find(':input');
      $inputs.filter('#id').val(data.id);
      $inputs.filter('#name').val(data.name);
      //$inputs.filter('#image').val(data.name);

      showCategoryForm();
    });

    return false;

  }).on('click', '#category-modal button[type="submit"]', function() {
    $('#category-modal form').submit();

  }).on('submit', '#category-modal form', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    var $submitBtn = $(this).find('button[type="submit"]').prop('disabled', true);

    $.ajax($.extend(categoryAjaxConfig, {
      type: 'post',
      url: this.action,
      data: formData,
    })).done(function(data) {
      if (!data) return;
      $submitBtn.prop('disabled', false);
      $(document).trigger('added.category', data);
      showCategoryList();
    });

    return false;

  }).on('hidden.bs.modal', '#category-modal', function() {
    $(this).find('form').get(0).reset();
  });
})(jQuery, document, window);
