<?php
include('private/DB.php');
include('classes/translate.php');

$currentdates = array();
$currentdatesdb = DB::query('SELECT date FROM menu');
$dates = array();
$time = time();
$format = "l d/m/Y";

foreach ($currentdatesdb as $currentdate) {
    $newcurrentdate = date($format, $currentdate['date']);
    array_push($currentdates, $newcurrentdate);
}

for ($i = 0; $i <= 31; $i++) {
    $newtime = $time + 60 * 60 * 24 * $i;
    $newtimeformat = date($format, $newtime);
    if (!in_array($newtimeformat, $currentdates)) {
        array_push($dates, $newtime);
    }
}

if (isset($_POST['submit'])) {
    if ($_POST['name']) {
        $name = $_POST['name'];
        $date = $_POST['date'];
        DB::query('INSERT INTO menu VALUES (0, :date, :name)', array(':date' => $date, ':name' => $name));
    } else {
        echo ('Geen naam ingegeven');
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

    <div class="menuw">
        <div class="menuwWrapper">
            <a href="menuvdweek.php"><img src="./assets/pictures/back.png" alt="Terug" id="back"></a>
            <div class="form">
                <form enctype="multipart/form-data" action="menuvdweekadd.php" method="POST">
                    <h5>Datum</h5>
                    <?php
                    echo '<select name="date">';
                    foreach ($dates as $date) {
                        echo '<option value="' . $date . '">' . Translate::translateDate(date($format, $date)) . '</option>';
                    }
                    echo '</select>';
                    ?>
                    <h5>Gerecht</h5>
                    <input type="text" name="name" placeholder="Naam gerecht" class="input" id="name">
                    <p />
                    <input type="submit" id="submit" name="submit" value="Voeg toe!">
            </div>
        </div>
    </div>
</body>

</html>