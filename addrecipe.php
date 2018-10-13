<?php
include('private/DB.php');

if (isset($_POST['addrecipe'])) {
  $name = $_POST['name'];
  $ingredients = $_POST['ingredients'];
  $ingredients = nl2br($ingredients);
  $recipe = $_POST['recipe'];
  $recipe = nl2br($recipe);

  $photo = $_FILES['photo'];
  $filetype = $photo['type'];
  $filetype = substr($filetype, 6);
  $targetdir = 'assets/pictures/recipes/';
  $targetfile = $targetdir.$name.".".$filetype;

  if ($name != "") {
    if ($ingredients != "") {
      if ($recipe != "") {
        if (move_uploaded_file($photo['tmp_name'], $targetfile)) {
          DB::query('INSERT INTO recipes VALUES (0, :name, :ingredients, :recipe, :photo)', array(':name'=>$name, ':ingredients'=>$ingredients, ':recipe'=>$recipe, ':photo'=>$targetfile));
        } else {
          echo 'Foto is niet geüpload!';
        }
      } else {
        echo "Het gerecht is ongeldig!";
      }
    } else {
      echo "Ingrediënten zijn ongeldig!";
    }
  } else {
    echo "Naam is ongeldig!";
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

    <div class="recipes">
      <div class="recipesWrapper">
        <a href="recipes.php"><img src="./assets/pictures/back.png" alt="Terug" id="back"></a>
        <div class="form">
          <form enctype="multipart/form-data" action="addrecipe.php" method="POST">
            <h5>Naam Gerecht:</h5>
            <input type="text" name="name" value="" placeholder="Naam gerecht" class="input" id="name">
            <h5>Ingrediënten:</h5>
            <textarea name="ingredients" placeholder="Ingrediënten" rows="30" cols="70" class="input"></textarea>
            <h5>Recept</h5>
            <textarea name="recipe" placeholder="Recept" rows="30" cols="80" class="input"></textarea>
            <h5>Foto</h5>
            <input type="file" name="photo" class="input">
            <input type="submit" value="Voeg toe" name="addrecipe" id="submit">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
