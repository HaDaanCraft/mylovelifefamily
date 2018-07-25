<?php
include('private/DB.php');

if(isset($_POST['namelist'])) {
  $namelist = $_POST['namelist'];
  DB::query('INSERT INTO lists VALUES (0, :name)', array(':name'=>$namelist));
  $listid = DB::query('SELECT id FROM lists WHERE name=:name', array(':name'=>$namelist))[0]['id'];
  DB::query('CREATE TABLE mylovelifefamily.list'.$listid.' ( id INT(64) NOT NULL AUTO_INCREMENT , value VARCHAR(100) NOT NULL , checked BOOLEAN NOT NULL , PRIMARY KEY (id))');
}

$lists = DB::query('SELECT * FROM lists ORDER BY name ASC');

if(isset($_POST['deletelist_x'])) {
  $listid = $_GET['deleteListId'];
  DB::query('DELETE FROM lists WHERE id=:id', array(':id'=>$listid));
  DB::query('DROP TABLE list'.$listid);
  header("Refresh:0");
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
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/main.js"></script>
  </head>
  <body>

  <div class="nav" id="nav">
  </div>

  <div class="list">
    <div class="listWrapper">
      <h3>Lijstjes</h3>
      <div class="listDiv">
        <div class="listAdd">
          <form method="post" action="lists.php">
            <input type="text" name="namelist" value="" placeholder="Maak een lijst" id="namelist">
            <input type="image" name="createlist" src="./assets/pictures/add.png" alt="Maak lijst" height="50px">
          </form>
        </div>
        <div class="listView">
          <?php
          foreach ($lists as $list) {
            echo '<a href=viewLists.php?id='.$list['id'].'>'.$list['name'].'</a>';
            echo '<form method="post" action="lists.php?deleteListId='.$list['id'].'">';
            echo '<input type="image" name="deletelist" src="./assets/pictures/delete.png" alt="Verwijder lijst" height="30px" id="deleteList">';
            echo '</form>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>


  </body>
</html>
