<?php
$p_fout = array_fill(1, 8, "");
$p = array_fill(1, 8, "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_fields = ["p1", "p2", "p3", "p4", "p5", "p6", "p7", "p8"];

    foreach ($input_fields as $index => $field) {
        if (empty($_POST[$field])) {
            $p_fout[$index + 1] = "antwoord is verplicht!";
        } else {
            $p[$index + 1] = test_input($_POST[$field]);
        }
    }
}

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
    <meta charset="UTF-8">
    <title>Mad Libs</title>
    <link rel="stylesheet" href="mad_libs.css">
<body class="background">
    <h1 class="text">Mad Libs</h1>
    <ul>
        <li><a class="active" href="paniek.php">Er heerst paniek...</a></li>
        <li><a href="onkunde.php">Onkunde</a></li>
    </ul>
    
    <form class="tekst" method="post" action="paniek_resultaat.php">
        <label>Welk dier zou je nooit als huisdier willen?</label>
        <input type="text" name="p1" value="<?php echo $p[1]; ?>">
        <span>* <?php echo $p_fout[1]; ?></span>
        <br><br>
        
        <label>Wie is de belangrijkste persoon in je leven?</label>
        <input type="text" name="p2" value="<?php echo $p[2]; ?>">
        <span>* <?php echo $p_fout[2]; ?></span>
        <br><br>
        
        <label>In welk land zou je graag willen wonen?</label>
        <input type="text" name="p3" value="<?php echo $p[3]; ?>">
        <span>* <?php echo $p_fout[3]; ?></span>
        <br><br>
        
        <label>Wat doe je als je je verveelt?</label>
        <input type="text" name="p4" value="<?php echo $p[4]; ?>">
        <span>* <?php echo $p_fout[4]; ?></span>
        <br><br>
        
        <label>Met welk speelgoed speelde je als kind het meest?</label>
        <input type="text" name="p5" value="<?php echo $p[5]; ?>">
        <span>* <?php echo $p_fout[5]; ?></span>
        <br><br>
        
        <label>Bij welke docent spijbel je het liefst?</label>
        <input type="text" name="p6" value="<?php echo $p[6]; ?>">
        <span>* <?php echo $p_fout[6]; ?></span>
        <br><br>
        
        <label>Als je €100.000,- had, wat zou je dan kopen?</label>
        <input type="text" name="p7" value="<?php echo $p[7]; ?>">
        <span>* <?php echo $p_fout[7]; ?></span>
        <br><br>
        
        <label>Wat is je favoriete bezigheid?</label>
        <input type="text" name="p8" value="<?php echo $p[8]; ?>">
        <span>* <?php echo $p_fout[8]; ?></span>
        <br><br>
        
        <input type="submit" name="submit" value="Versturen">
    </form>
    
    <footer>© Milan Sebes - 2024</footer>
</body>
</html>
