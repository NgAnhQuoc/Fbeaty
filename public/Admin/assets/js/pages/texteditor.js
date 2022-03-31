$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'Nhập nội dung vào nhé',
        tabsize: 2,
        height: 400,
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onChange: function(contents, $editable) {
              $('#summernote').text(contents);
            }
          }
    });

});
