<?php
include('private/DB.php');

$recipes = DB::query('SELECT * FROM recipes');
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
        <h3>Gerechten</h3>
        <h4><a href="addrecipe.php">Voeg gerecht toe!</a></h4>
        <div class="recipesDiv">
          <?php
          foreach ($recipes as $recipe) {
            echo "<div class='recipe'>";
              echo "<a href='viewrecipe.php?id=".$recipe['id']."'>";
              echo "<center><img src='".$recipe['photo']."'/></center>";
              echo "<hr />";
              echo "<p class='name'>".$recipe['name']."</p>";
              echo "</a>";
            echo "</div>";
          }
          ?>
        </div>
      </div>
    </div>

  </body>
</html>
