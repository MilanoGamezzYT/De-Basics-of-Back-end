<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Mad Libs</title>
    <link rel="stylesheet" href="mad_libs.css">
</head>
<body class="background">
    <h1 class ="text"> Mad Libs</h1>
        <ul>
        <li><a class="active" href="paniek.php">Er heerst paniek...</a></li>
        <li><a href="onkunde.php">Onkunde</a></li>
        </ul>
    <?php
    $p1fout = $p2fout = $p3fout = $p4fout = $p5fout = $p6fout = $p7fout = $p8fout = "";
    $p1 = $p2 = $p3 = $p4 = $p5 = $p6 = $p7 = $p8 = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["p1"])) {
            $p1fout = "antwoord is verplicht!";
        } else {
            $p1 = test_input($_POST["p1"]);
        }
        if (empty($_POST["p2"])) {
            $p2fout = "antwoord is verplicht!";
        } else {
            $p2 = test_input($_POST["p2"]);
        }
        if (empty($_POST["p3"])) {
            $p3fout = "antwoord is verplicht!";
        } else {
            $p3 = test_input($_POST["p3"]);
        }
        if (empty($_POST["p4"])) {
            $p4fout = "antwoord is verplicht!";
        } else {
            $p4 = test_input($_POST["p4"]);
        }
        if (empty($_POST["p5"])) {
            $p5fout = "antwoord is verplicht!";
        } else {
            $p5 = test_input($_POST["p5"]);
        }
        if (empty($_POST["p6"])) {
            $p6fout = "antwoord is verplicht!";
        } else {
            $p6 = test_input($_POST["p6"]);
        }
        if (empty($_POST["p7"])) {
            $p7fout = "antwoord is verplicht!";
        } else {
            $p7 = test_input($_POST["p7"]);
        }
        if (empty($_POST["p8"])) {
            $p8fout = "antwoord is verplicht!";
        } else {
            $p8 = test_input($_POST["p8"]);
        }
    }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
            <form  class="tekst" method="post" action="paniek_resultaat.php">  
            welke dier zou je nooit als huisdier willen? <input type="text" name="p1">
            <span>* <?php echo $p1fout;?></span>
            <br><br>
            Wie is de belangrijkste persoon in je leven? <input type="text" name="p2">
            <span>* <?php echo $p2fout;?></span>
            <br><br>
            In welke land zou je graag willen wonen? <input type="text" name="p3">
            <span>* <?php echo $p3fout;?></span>
            <br><br>
            Wat doe je als je je verveelt? <input type="text" name="p4">
            <span>* <?php echo $p4fout;?></span>
            <br><br>
            Met welke speelgoed speelde je als kind het meest? <input type="text" name="p5">
            <span>* <?php echo $p5fout;?></span>
            <br><br>
            Bij welke docent spijbel je het liefst? <input type="text" name="p6">
            <span>* <?php echo $p6fout;?></span>
            <br><br>
            Als je €100.000,- had, wat zou je dan kopen? <input type="text" name="p7">
            <span>* <?php echo $p7fout;?></span>
            <br><br> 
            Wat is je favoriete bezigheid? <input type="text" name="p8">
            <span>* <?php echo $p8fout;?></span>
            <br><br>   
            <input type="submit" name="submit" value="Versturen"> 
            </form>
            <footer>© Milan Sebes - 2024</footer>
</body>