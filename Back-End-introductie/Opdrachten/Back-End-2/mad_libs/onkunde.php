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

// Als de server request post is, dan is het valid
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //
    $allValid = true;
    // De fields worden omgezet naar Key en naar een waarde
    foreach ($fields as $key => $value) { 
        // Als het invulveld leeg is, dan moet hij een fout aangeven
        if (empty($_POST[$key])) {
            ${$key . "fout"} = "antwoord is verplicht!";
            // allValid is false als het veld niet is ingevuld
            $allValid = false;
        } else {
            // 
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
    
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET" || $allValid == false){?>
    <form class="tekst" method="post" action="onkunde.php">
        <?php foreach ($fields as $key => $value): ?>
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
            <input type="text" name="<?php echo $key; ?>" value="<?php echo ${$key}; ?>" required>
            <span>* <?php echo ${$key . "fout"}; ?></span>
            <br><br>
        <?php endforeach; ?>
        <input type="submit" name="submit" value="Versturen"> 
    </form>
    <?php }
    else{ 
    ?>
    Er zijn veel mensen die niet kunnen <?php echo $_POST["p1"]; ?>.
    Mensen zoals <?php echo $_POST["p2"]; ?>.
    zelfs met de hulp van een <?php echo $_POST["p4"]; ?> of zelfs 
    <?php echo $_POST["p3"]; ?> kan <?php echo $_POST["p2"]; ?> niet <?php echo $_POST["p1"]; ?>.
    Dit heeft niet te maken met gebrek aan <?php echo $_POST["p5"]; ?>, maar met een te veel aan 
    <?php echo $_POST["p6"]; ?>. Te veel <?php echo $_POST["p6"]; ?> leidt tot <?php echo $_POST["p7"]; ?> en dat is niet goed als je wilt 
    <?php echo $_POST["p1"]; ?>. Helaas voor <?php echo $_POST["p2"]; ?>.

        <?php } ?>
    <footer>© Milan Sebes - 2024</footer>
</body>
</html>
