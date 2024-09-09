<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>J2F1BELP5L2 - Content uit je database</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- laad hier via php je header in (vanuit je includes map) -->
  <?php include 'includes/header.php'; ?>

  <!-- Haal hier uit de URL welke pagina uit het menu is opgevraagd. Gebruik deze om de content uit de database te halen. -->
  <?php
  $conn = new mysqli('localhost', 'root', '', 'databank_php');

  if ($conn->connect_error) {
      die("Verbinding mislukt: " . $conn->connect_error);
  }

  $page = isset($_GET['page']) ? $_GET['page'] : 'home';

  $sql = "SELECT * FROM onderwerpen WHERE name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $page);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
          echo "<p>" . htmlspecialchars($row['description']) . "</p>";
          echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
      }
  } else {
      echo "<p>Geen content gevonden voor de pagina '$page'.</p>";
  }

  $stmt->close();
  $conn->close();
  ?>

  <!-- laad hier via php je footer in (vanuit je includes map)-->
  <?php include 'includes/footer.php'; ?>

</body>
</html>
