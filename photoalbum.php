<!-- <?php

      require('classes/imageRotate/imageRotate.php');

      $rotate = new imageRotate();
      $rotate->fixOrientation("File");



      ?> -->

<?php
if (isset($_GET['nameNewFolder'])) {
  $newfolder = rawurldecode($_GET['nameNewFolder']);
  $location = rawurldecode($_GET['album']);
  $lastpage = $_GET['lastPage'];
  $album = $location . "/" . $newfolder;
  if (!file_exists('nano_photos_provider2/nano_photos_content/' . $album)) {
    mkdir('nano_photos_provider2/nano_photos_content/' . $album, 0777, true);
  }
  echo "<script>
  window.location.href = 'uploadfoto.php?album=" . $album . "&lastpage=".$lastpage."&newFolder=".$newfolder."';
  </script>";
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>MyLoveLifeFamily</title>
  <link rel="icon" href="./assets/pictures/family.ico">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
  <script src="js/jquery.md5.js" type="text/javascript"></script>
  <script src="js/main.js"></script>
  <link href="https://unpkg.com/nanogallery2@2.4.2/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="https://unpkg.com/nanogallery2@2.4.2/dist/jquery.nanogallery2.min.js"></script>
</head>

<body>

  <div class="navResponsive" id="navResponsive">
  </div>

  <div class="nav" id="nav">
  </div>

  <div class="menu">
    <div class="menuWrapper">
      <h3 id="albumMenuNewAlbum">Nieuw Album</h3>
      <h3 id="albumMenuUploadFoto">Upload Foto's</h3>
    </div>
  </div>

  <div id="my_nanogallery" data-nanogallery2='{
        "kind": "nano_photos_provider2",
        "dataProvider": "/mylovelifefamily/nano_photos_provider2/nano_photos_provider2.php",
        "thumbnailWidth": "200",
        "thumbnailAlignment": "center"
      }'>

  </div>

</body>

</html>