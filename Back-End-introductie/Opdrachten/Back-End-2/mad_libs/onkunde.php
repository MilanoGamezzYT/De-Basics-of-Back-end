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
        <?php
        $p1fout = $p2fout = $p3fout = $p4fout = $p5fout = $p6fout = $p7fout = "";
        $p1 = $p2 = $p3 = $p4 = $p5 = $p6 = $p7 = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["p1"])) {
                $p1fout = "antwoord is verplicht!";
            } else {
                $p1 = antwoord($_POST["p1"]);
            }
            if (empty($_POST["p2"])) {
                $p2fout = "antwoord is verplicht!";
            } else {
                $p2 = antwoord($_POST["p2"]);
            }
            if (empty($_POST["p3"])) {
                $p3fout = "antwoord is verplicht!";
            } else {
                $p3 = antwoord($_POST["p3"]);
            }
            if (empty($_POST["p4"])) {
                $p4fout = "antwoord is verplicht!";
            } else {
                $p4 = antwoord($_POST["p4"]);
            }
            if (empty($_POST["p5"])) {
                $p5fout = "antwoord is verplicht!";
            } else {
                $p5 = antwoord($_POST["p5"]);
            }
            if (empty($_POST["p6"])) {
                $p6fout = "antwoord is verplicht!";
            } else {
                $p6 = antwoord($_POST["p6"]);
            }
            if (empty($_POST["p7"])) {
                $p7fout = "antwoord is verplicht!";
            } else {
                $p7 = antwoord($_POST["p7"]);
            }
        }
            function antwoord($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
                <form  class="tekst" method="post" action="onkunde_resultaat.php">  
                Wat zou je graag willen kunnen? <input type="text" name="p1">
                <span>* <?php echo $p1fout;?></span>
                <br><br>
                Met welke persoon kun je goed opschieten? <input type="text" name="p2">
                <span>* <?php echo $p2fout;?></span>
                <br><br>
                Wat is je favoriete getal? <input type="text" name="p3">
                <span>* <?php echo $p3fout;?></span>
                <br><br>
                Wat heb je altijd bij je als je op vakantie gaat? <input type="text" name="p4">
                <span>* <?php echo $p4fout;?></span>
                <br><br>
                Wat is je beste persoonlijke eigenschap? <input type="text" name="p5">
                <span>* <?php echo $p5fout;?></span>
                <br><br>
                Wat is je slechtste persoonlijke eigenschap? <input type="text" name="p6">
                <span>* <?php echo $p6fout;?></span>
                <br><br>
                Wat is het ergste wat je kan overkomen? <input type="text" name="p7">
                <span>* <?php echo $p7fout;?></span>
                <br><br>    
                <input type="submit" name="submit" value="Versturen">  
                </form>
                <footer>© Milan Sebes - 2023</footer>
    </body>
</head>