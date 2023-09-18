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
        $backgroundImage = '../images/morning.png';
    } elseif ($currentHour >= 12 && $currentHour < 18) {
        $greeting = 'Goede middag';
        $backgroundImage = '../images/afternoon.png';
    } elseif ($currentHour >= 18 && $currentHour < 24) {
        $greeting = 'Goede avond';
        $backgroundImage = '../images/evening.png';
    } else {
        $greeting = 'Goede nacht';
        $backgroundImage = '../images/night.png';
    }

    echo '<style>body { background-image: url(' . $backgroundImage . '); }</style>';
    echo '<h1>' . $greeting . '!</h1>';
    echo '<p>Het is nu ' . date('H:i') . ' uur</p>';
    ?>
</body>
</html>