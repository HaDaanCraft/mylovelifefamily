<?php
include('private/DB.php');
if(isset($_POST['namelist'])) {
  $namelist = $_POST['namelist'];
  DB::query('INSERT INTO lists VALUES (0, :name)', array(':name'=>$namelist));
}

$lists = DB::query('SELECT * FROM lists ORDER BY name ASC');

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>MyLoveLifeFamily</title>
    <link rel="icon" href="./assets/pictures/family.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/main.js"></script>
  </head>
  <body>

  <div class="nav" id="nav">
  </div>

  <div class="list">
    <div class="listWrapper">
      <h3>Lijstjes</h3>
      <div class="listAdd">
        <form method="post" action="lists.php">
          <input type="text" name="namelist" value="" placeholder="Maak een lijst">
          <input type="image" name="createlist" src="./assets/pictures/add.png" alt="Maak lijst" height="50px">
        </form>
      </div>
      <div class="listView">
        <?php
        foreach ($lists as $list) {
          echo '<a href=lists.php?'.$list['id'].'>'.$list['name'].'</a>'.'</br>';
        }
        ?>
      </div>
    </div>
  </div>


  </body>
</html>
