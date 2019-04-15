<?php
include('private/DB.php');

if (isset($_POST['login'])) {
  $pin = $_POST['pin'];

  if (DB::query('SELECT * FROM users WHERE pin=:pin', array(':pin'=>$pin))) {
    $userType = DB::query('SELECT userType FROM users WHERE pin=:pin', array(':pin'=>$pin))[0]['userType'];
    echo '<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>';
    echo '<script type="text/javascript">',
     'Cookies.set("loggedInUserType", "'.$userType.'", { expires: 1 });',
     '</script>';
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

  <body class="loginFile">

    <div class="nav">
      <div class="navWrapper">
        <img src="./assets/pictures/family.ico" alt="Family Icon">
      </div>
    </div>

    <div class="login">
      <div class="loginWrapper">
        <h3>Login</h3>
        <form action="login.php" method="post">
          <input type="number" name="pin" placeholder="Pin..." id="pin"> <p />
          <input type="submit" name="login" value="Login" id="button">
        </form>
      </div>
    </div>

  <!-- 8973 -->
</html>
