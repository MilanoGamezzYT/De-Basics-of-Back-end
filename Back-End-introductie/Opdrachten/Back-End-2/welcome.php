<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <head>
  <title>Welkom!</title>
</head>
<body>
  <div class="container">
    <h2>Welkom!</h2>
    <?php
      $naam = isset($_GET['naam']) ? htmlspecialchars($_GET['naam']) : '';
      $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';

      echo "<p>Naam: $naam</p>";
      echo "<p>E-mailadres: $email</p>";
    ?>
  </div>
</html>
