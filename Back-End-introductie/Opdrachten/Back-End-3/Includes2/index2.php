<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Includes</title>
</head>
<body>
    <header>
        <h1>Welkom op mijn website</h1>
    </header>
    <main>
        <?php include 'content.php'; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Milan Sebes</p>
    </footer>
</body>
</html>
