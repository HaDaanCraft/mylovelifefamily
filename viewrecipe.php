<?php
include('private/DB.php');

$recipe = DB::query('SELECT * FROM recipes WHERE id=:id', array('id'=>$_GET['id']))[0];

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
        <h3><?php echo $recipe['name'];?></h3>
        <div class="recipeDiv">
          <div class="photo">
            <img src="<?php echo $recipe['photo']; ?>" />
          </div>
          <div class="ingredients">
            <p class="hltext"><underline>Ingediënten</underline></p>
            <?php echo $recipe['ingredients']; ?>
          </div>
          <div class="preparation">
            <p class="hltext"><underline>Recept</underline></p>
            <?php echo $recipe['recipe']; ?>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
