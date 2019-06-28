<?php
include('private/DB.php');
include('classes/translate.php');

$recipes = DB::query('SELECT menu.date, menu.name FROM menu ORDER BY menu.date ASC');

$format = "l d/m/Y";

if (isset($_POST['delete'])) {
    $date = $_GET['gerechtdate'];
    DB::query('DELETE FROM menu WHERE date=:date', array(':date'=>$date));
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

    <div class="menuw">
        <div class="menuwWrapper">
            <h3>Menu Van De Week</h3>
            <?php if ($_COOKIE['loggedInUserType'] == 0 || $_COOKIE['loggedInUserType'] == 2) {
                echo '<h4><a href="menuvdweekadd.php">Verander de menu!</a></h4>';
            } ?>
            <div class="menuwDiv">
                <?php

                foreach ($recipes as $recipe) {
                    echo '<div class="day">
                            <div class="date">
                                <p class="datep">' . Translate::translateDate(date($format, $recipe['date'])) . '</p>
                            </div>
                            <div class="gerecht">
                                <p class="gerechtp">' . $recipe['name'] . '<p />';
                                if ( $_COOKIE['loggedInUserType'] == 0 || $_COOKIE['loggedInUserType'] == 2){
                                echo '<form class="form" action="menuvdweek.php?gerechtdate='.$recipe['date'].'" method="POST">
                                    <input type="submit" id="delete" name="delete" value="Delete">
                                </form>';
                                }
                            echo '</div>
                        </div>
                        <hr />';
                }

                ?>
            </div>
        </div>
    </div>

</body>

</html>