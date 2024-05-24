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
            <li><a class="active" href="paniek.php">Opnieuw?</a></li>
            </ul>
    </body>
    <p class=tekst>
    Er heerst paniek...<br><br>
    Er heerst paniek in het koninkrijk <?php echo $_POST["p3"]; ?>. Koning <?php echo $_POST["p6"]; ?> 
    is ten einde raad en als koning <?php echo $_POST["p6"]; ?> 
    ten einde raad is, dan roept hij zijn ten-einde-raadsheer <?php echo $_POST["p2"]; ?>.<br><br>
    "<?php echo $_POST["p2"]; ?>! Het is een ramp! Het is een schande!"<br><br>
    "Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?"<br><br>
    "Mijn <?php echo $_POST["p1"]; ?> is verdwenen! Zo maar, zonder waarschuwing. 
    En ik had net <?php echo $_POST["p5"]; ?> voor hem gekocht!"<br><br>
    "Majesteit, uw <?php echo $_POST["p1"]; ?> komt vast vanzelf weer terug?"<br><br>
    "Ja, da's leuk en aardig, maar hoe moet ik in de tussentijd <?php echo $_POST["p8"]; ?> leren?<br><br>
    "Maar Sire, daar kunt u toch uw <?php echo $_POST["p7"]; ?> voor gebruiken."<br><br>
    "<?php echo $_POST["p2"]; ?>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had." <br><br>
    "Mij vervelen, Sire."
    </p>
    <footer>© Milan Sebes - 2024</footer>
</head>