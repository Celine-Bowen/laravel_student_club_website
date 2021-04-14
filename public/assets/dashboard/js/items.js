$(document).ready(function(){
  $(".item-form").on("submit", function (e) {
    let quillEditor = new Quill('.editor-article');
    let value = $('.editor-article > div.ql-editor').html();
    if (quillEditor.getLength() > 1) {
      $(this).append("<textarea name='article' style='display:none'>"+value+"</textarea>");
    }
  });
});