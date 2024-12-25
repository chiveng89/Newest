<!DOCTYPE html>
<html>
<head>
  <script
    type="text/javascript"
    {{URL('assets/js/script.js')}}
    src={{URL('assets/js/tinymce/js/tinymce/tinymce.min.js')}}
    referrerpolicy="origin">
  </script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#myTextarea',
    width: 6000,
    height: 300,

    plugins: [
      'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
      'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
      'media', 'table', 'emoticons', 'help'
    ],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'
  });
  </script>
  <style>
        text-area{
            margin-top: 10px;
        }
  </style>
</head>

<body>

  <textarea id="myTextarea" class="text-area"></textarea>
</body>
</html>
