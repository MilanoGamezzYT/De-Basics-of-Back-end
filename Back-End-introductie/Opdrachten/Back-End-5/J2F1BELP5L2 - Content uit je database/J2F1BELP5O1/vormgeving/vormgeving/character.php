<?php
// Verbinden met de Database
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
$stmt = $pdo->prepare("SELECT * FROM characters WHERE id = ?");
$stmt->execute([$id]);
$character = $stmt->fetch();

if ($character) {
    $name = htmlspecialchars($character['name']);
    $avatar = htmlspecialchars($character['avatar']);
    $health = intval($character['health']);
    $attack = intval($character['attack']);
    $defense = intval($character['defense']);
    $weapon = htmlspecialchars($character['weapon']);
    $armor = htmlspecialchars($character['armor']);
    $bio = nl2br(htmlspecialchars($character['bio']));
    $color = htmlspecialchars($character['color']);
} else {
    echo "Character not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character - <?= $name ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header><h1><?= $name ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?= $avatar ?>">
            <div class="stats" style="background-color: <?= $color ?>">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?= $health ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?= $attack ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?= $defense ?></li>
                </ul>
                <ul class="gear">
                    <li><b>Weapon</b>: <?= $weapon ?: 'None' ?></li>
                    <li><b>Armor</b>: <?= $armor ?: 'None' ?></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <p><?= $bio ?></p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<footer>&copy; Milan Sebes 2024</footer>
</body>
</html>
