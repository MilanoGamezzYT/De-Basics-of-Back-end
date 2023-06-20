<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Mad Libs</title>
    <link rel="stylesheet" href="mad_libs.css">
</head>

<head>
    <body class="background">
        <h1 class ="text"> Mad Libs</h1>
        <ul>
        <li><a class="active" href="paniek.php">Er heerst paniek...</a></li>
        <li><a href="onkunde.php">Onkunde</a></li>
        </ul>
        <p class=tekst>
            Kies hier boven tussen: er heerst paniek... of onkunde.
        </p>
    </body>
</head>