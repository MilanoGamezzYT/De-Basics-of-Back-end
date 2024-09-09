<!doctype html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Lab 2 - Includes en Require</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- Laad de header in -->
  <?php include 'includes/header.php'; ?>

  <?php
  if (isset($_GET['page'])) {
    include 'pages/' . $_GET['page'] . '.php';
  } else {
    echo '<p>Selecteer een onderwerp uit het menu.</p>';
  }
  ?>

  <!-- Laad de footer in -->
  <?php include 'includes/footer.php'; ?>

</body>
</html>
