<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/global.css">

    <title><?= $title ;?></title>
  </head>
  <body>
  <?= $this->include('layout/navbar'); ?>
  <?= $this->renderSection('content'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewImg() {
      const cover = document.querySelector('#cover');
      const coverLabel = document.querySelector('#cover-label');
      const imgPreview = document.querySelector('.img-preview');

      // set display block
      
      const coverPreview = new FileReader();
      coverPreview.readAsDataURL(cover.files[0]);
      
      coverPreview.onload = function(e) {
        cover.classList.remove('d-none');
        coverLabel.classList.add('d-none');
        imgPreview.src = e.target.result;
      }
    }
  </script>
  </body>
</html>