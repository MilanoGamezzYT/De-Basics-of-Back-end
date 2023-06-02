<?php
// opdracht 1

function lijst_optellen($numbers) {
    $EvenGetallen = array_filter($numbers, function($number) {
        return $number % 2 == 0;
    });

    $sum = array_sum($EvenGetallen);
    return $sum;
}

$getallenLijst = [1, 2, 3, 4];
$result = lijst_optellen($getallenLijst);
echo $result;
echo "<br>";


// opdracht 2

function LangeWoord($woordenlijst) {
    $langsteWoord = '';
  
    foreach ($woordenlijst as $woord) {
        if (strlen($woord) > strlen($langsteWoord)) {
            $langsteWoord = $woord;
        }
    }
  
    return $langsteWoord;
}

$woorden = ['kat', 'hond', 'olifant'];
$langsteWoord = LangeWoord($woorden);
echo $langsteWoord; 
?>