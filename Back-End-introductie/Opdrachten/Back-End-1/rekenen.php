<?php
function tafelVan($getal) {
    for ($i = 1; $i <= 10; $i++) {
        $resultaat = $getal * $i;
        echo "$getal x $i = $resultaat<br>";
    }
}

echo "Tafel van 6:<br>";
tafelVan(6);

echo "<br>";

$waardes = array(3, 5, 8, 12);

foreach ($waardes as $waarde) {
    echo "Tafel van $waarde:<br>";
    tafelVan($waarde);
    echo "<br>";
}
?>