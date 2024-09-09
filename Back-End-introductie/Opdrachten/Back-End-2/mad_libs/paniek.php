<?php
$p1fout = $p2fout = $p3fout = $p4fout = $p5fout = $p6fout = $p7fout = $p8fout = "";
$p1 = $p2 = $p3 = $p4 = $p5 = $p6 = $p7 = $p8 = "";

$fields = array(
    "p1" => "welke dier zou je nooit als huisdier willen?",
    "p2" => "Wie is de belangrijkste persoon in je leven?",
    "p3" => "In welk land zou je graag willen wonen?",
    "p4" => "Wat doe je als je je verveelt?",
    "p5" => "Met welke speelgoed speelde je als kind het meest?",
    "p6" => "Bij welke docent spijbel je het liefst?",
    "p7" => "Als je €100.000,- had, wat zou je dan kopen?",
    "p8" => "Wat is je favoriete bezigheid?"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($fields as $key => $value) {
        if (empty($_POST[$key])) {
            ${$key . "fout"} = "antwoord is verplicht!";
        } else {
            ${$key} = test_input($_POST[$key]);
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
</head>
<body class="background">
    <h1 class="text">Mad Libs</h1>
    <ul>
        <li><a class="active" href="paniek.php">Er heerst paniek...</a></li>
        <li><a href="onkunde.php">Onkunde</a></li>
    </ul>
    
    <form class="tekst" method="post" action="paniek_resultaat.php">
        <?php foreach ($fields as $key => $value): ?>
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
            <input type="text" name="<?php echo $key; ?>" value="<?php echo ${$key}; ?>" required>
            <span>* <?php echo ${$key . "fout"}; ?></span>
            <br><br>
        <?php endforeach; ?>
        
        <input type="submit" name="submit" value="Versturen"> 
    </form>
    
    <footer>© Milan Sebes - 2024</footer>
</body>
</html>
