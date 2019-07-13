<?php

include('classes/imageRotate/imageRotate.php');
$imageRotate = new imageRotate;

function reArrayFiles($file_post)
{
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}


if (isset($_GET['lastpage'])) {
    if (isset($_GET['album'])) {
        $album = rawurldecode($_GET['album']);
    } else {
        $album = "";
    }
    $lastpagecr = $_GET['lastpage'];
    $lastpagedecr = str_replace("µ", "#", $lastpagecr);
    if (isset($_GET['newFolder'])) {
        $newfolder = $_GET['newFolder'];
    } else {
        $newfolder = "";
    }

    if (isset($_POST['uploadfoto'])) {
        $photoarray = reArrayFiles($_FILES['photos']);

        foreach ($photoarray as $photo) {

            $filetype = $photo['type'];
            $filetype = substr($filetype, 6);
            $name = $photo['name'];
            $targetdir = 'nano_photos_provider2/nano_photos_content/' . $album . '/';
            $targetfile = $targetdir . $name . "." . $filetype;

            move_uploaded_file($photo['tmp_name'], $targetfile);

            $imageRotate->fixOrientation($targetfile);

        }

        echo "<script>
        window.location.href = '".$lastpagedecr."';
        </script>";
    }
}


?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>MyLoveLifeFamily</title>
    <link rel="icon" href="./assets/pictures/family.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/main.js"></script>
</head>

<body>

    <div class="navResponsive" id="navResponsive">
    </div>

    <div class="nav" id="nav">
    </div>

    <div class="photos">
        <div class="photosWrapper">
            <h3>Upload Foto's</h3>
            <a href="<?php echo $lastpagedecr; ?>"><img src="./assets/pictures/back.png" alt="Terug" id="back"></a>
            <div class="form">
                <form enctype="multipart/form-data" action="<?php echo "uploadfoto.php?album=" . $album . "&lastpage=" . $lastpagecr . "&newFolder=" . $newfolder; ?>" method="POST">
                    <h5>Selecteer foto's:</h5>
                    <input type="file" name="photos[]" class="input" multiple>
                    <h5>Album:</h5>
                    <input type="text" name="name" value="<?php echo $album; ?>" class="input" id="name" disabled>
                    <input type="submit" value="Upload" name="uploadfoto" id="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>