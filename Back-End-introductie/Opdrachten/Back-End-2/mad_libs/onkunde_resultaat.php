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
            <li><a class="active" href="onkunde.php">opnieuw?</a></li>
            </ul>
    </body>
    <p class=tekst>
    Er zijn veel mensen die niet kunnen <?php echo $_POST["p1"]; ?>.
    Mensen zoals <?php echo $_POST["p2"]; ?>.
    zelfs met de hulp van een <?php echo $_POST["p4"]; ?> of zelfs 
    <?php echo $_POST["p3"]; ?> kan <?php echo $_POST["p2"]; ?> niet <?php echo $_POST["p1"]; ?>.
    Dit heeft niet te maken met gebrek aan <?php echo $_POST["p5"]; ?>, maar met een te veel aan 
    <?php echo $_POST["p6"]; ?>. Te veel <?php echo $_POST["p6"]; ?> leidt tot <?php echo $_POST["p7"]; ?> en dat is niet goed als je wilt 
    <?php echo $_POST["p1"]; ?>. Helaas voor <?php echo $_POST["p2"]; ?>.
    <footer>© Milan Sebes - 2024</footer>
</head>