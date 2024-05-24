3<!DOCTYPE html>
<html>
<head>
  <title>Welkom!</title>
  <link rel="stylesheet" href="welcome.css">
</head>
<body>
  <div class="container">
    <h2>Welkom!</h2>
    <form action="welcome.php" method="GET">
      <label for="naam">Naam:</label>
      <input type="text" name="naam" id="naam" required>
      <br>
      <label for="email">E-mailadres:</label>
      <input type="email" name="email" id="email" required>
      <br>
      <input type="submit" value="Verzenden">
    </form>
  </div>
<?php
  $naam = isset($_GET['naam']) ? htmlspecialchars($_GET['naam']) : '';
      $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';

      echo "<p>Naam: $naam</p>";
      echo "<p>E-mailadres: $email</p>";
?>
</body>
</html>

