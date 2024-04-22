<?php
$naam = "Milan Sebes";
$afbeeldingSrc = "MaxVerstappenMiamiP1.jpg";
$afbeeldingAlt = "Max Verstappen in Miami";
$loremIpsumTekst = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget ligula eu felis vestibulum bibendum.";
for ($j = 0; $j < 10; $j++) {
    echo '<img src="' . $afbeeldingSrc . '" alt="' . $afbeeldingAlt . '" width="300px" height="400px">';
    echo '<h1>' . $naam . '</h1>';
    echo '<p>' . $loremIpsumTekst . '</p>';
}
?>