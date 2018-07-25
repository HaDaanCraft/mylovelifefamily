<?php
if(isset($_POST['testclick_x'])) {
  $id = $_GET['deleteListId'];
  echo $id;
  echo 'Hello World';
}

 ?>


<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>MyLoveLifeFamily Test Page</title>
    <link rel="icon" href="./assets/pictures/family.ico">
  </head>
  <body>
    <form method="post" action="testing.php?deleteListId=10">
      <a href="?id=10">Test</a>
      <input type="image" name="testclick" src="./assets/pictures/delete.png" alt="Verwijder lijst" height="30px">
  </body>
</html>
