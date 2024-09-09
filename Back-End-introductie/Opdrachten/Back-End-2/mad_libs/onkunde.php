<?php
$p1fout = $p2fout = $p3fout = $p4fout = $p5fout = $p6fout = $p7fout = "";
$p1 = $p2 = $p3 = $p4 = $p5 = $p6 = $p7 = "";

$fields = array(
    "p1" => "Wat zou je graag willen kunnen?",
    "p2" => "Met welke persoon kun je goed opschieten? ",
    "p3" => "Wat is je favoriete getal?",
    "p4" => "Wat heb je altijd bij je als je op vakantie gaat? ",
    "p5" => "Wat is je beste persoonlijke eigenschap? ",
    "p6" => "Wat is je slechtste persoonlijke eigenschap?",
    "p7" => "Wat is het ergste wat je kan overkomen?",
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $allValid = true;
    foreach ($fields as $key => $value) {
        if (empty($_POST[$key])) {
            ${$key . "fout"} = "antwoord is verplicht!";
            $allValid = false;
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
    
    <form class="tekst" method="post" action="onkunde_resultaat.php">
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
