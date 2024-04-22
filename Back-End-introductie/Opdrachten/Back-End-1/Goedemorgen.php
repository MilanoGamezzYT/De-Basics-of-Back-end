<!DOCTYPE html>
<html>
<head>
    <title>Eindopdracht</title>
    <style>
        body {  
            background-size: cover;
            text-align: center;
            font-size: 30px;
            color: black;
            padding-top: 200px;
            font-family: 'Lucida Handwriting';
        }
    </style>
</head>
<body>
    <?php
    $currentHour = date('G');
    $greeting = '';
    $backgroundImage = '';

    if ($currentHour >= 6 && $currentHour < 12) {
        $greeting = 'Goede morgen';
        $backgroundImage = 'morning.png';
    } elseif ($currentHour >= 12 && $currentHour < 18) {
        $greeting = 'Goede middag';
        $backgroundImage = 'afternoon.png';
    } elseif ($currentHour >= 18 && $currentHour < 24) {
        $greeting = 'Goede avond';
        $backgroundImage = 'evening.png';
    } else {
        $greeting = 'Goede nacht';
        $backgroundImage = 'night.png';
    }
    ?>
    <style>
        body { 
            background-image: url('images/<?php echo $backgroundImage; ?>');
        }
    </style>

    <h1><?php echo $greeting; ?>!</h1>
    <p>Het is nu <?php echo date('H:i'); ?> uur</p>
</body>
</html>
