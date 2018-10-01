<?php
include('private/DB.php');

if(isset($_POST['listItem'])) {
  $listItem = $_POST['listItem'];
  DB::query('INSERT INTO list'.$_GET['id'].' VALUES (0, :value, 0)', array(':value'=>$listItem));
}

$items = DB::query('SELECT * FROM list'.$_GET['id'].' ORDER BY value ASC');

if(isset($_POST['checkitem_x'])) {
  $checked = DB::query('SELECT checked FROM list'.$_GET['id'].' WHERE id=:itemid', array(':itemid'=>$_GET['itemId']))[0]['checked'];
  if($checked) {
    DB::query('UPDATE list'.$_GET['id'].' SET checked=0 WHERE id=:itemId', array(':itemId'=>$_GET['itemId']));
    header("Refresh:0");
  } else {
    DB::query('UPDATE list'.$_GET['id'].' SET checked=1 WHERE id=:itemId', array(':itemId'=>$_GET['itemId']));
    header("Refresh:0");
  }
}

if(isset($_POST['deleteitem_x'])) {
  DB::query('DELETE FROM list'.$_GET['id'].' WHERE id=:itemId', array(':itemId'=>$_GET['itemId']));
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
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/main.js"></script>
  </head>
  <body>

    <div class="navResponsive" id="navResponsive">
    </div>

    <div class="nav" id="nav">
    </div>

    <div class="list">
      <div class="listWrapper">
        <a href="lists.php"><img src="./assets/pictures/back.png" alt="Terug"></a><h3><?php echo DB::query('SELECT name FROM lists WHERE id=:id', array(':id'=>$_GET['id']))[0]['name'] ?></h3>
        <div class="listDiv">
          <div class="listAdd">
            <form method="post" action="viewLists.php?id=<?php echo $_GET['id'] ?>">
              <input type="text" name="listItem" value="" placeholder="Voeg iets toe aan de lijst" id="listItem">
              <input type="image" name="createlist" src="./assets/pictures/add.png" alt="Maak lijst" height="50px">
            </form>
          </div>
          <div class="listView">
            <?php
            foreach ($items as $item) {
              if($item['checked']) {
                echo '<p class="checked">'.$item['value'].'</p>';
              } else {
                echo '<p>'.$item['value'].'</p>';
              }
              echo '<form method=post action=?id='.$_GET['id'].'&itemId='.$item['id'].'>';
              echo '<input type="image" name="checkitem" src="./assets/pictures/check.png" alt="Vink aan" height="30px" id="checkItem">';
              echo '<input type="image" name="deleteitem" src="./assets/pictures/delete.png" alt="Verwijder" height="30px" id="deleteItem">';
              echo '</form>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>


  </body>
</html>
