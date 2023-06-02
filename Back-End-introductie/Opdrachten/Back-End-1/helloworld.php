<!DOCTYPE html>
<html>
<head>
	<title>Hello World!</title>
</head>
<body>
	<?php
	// Stap 1 
	echo "<h1>hello world hoi!</h1>";

	// Stap 2
	define("GREETING", "hello world!");
	echo "<h1>" . GREETING . "</h1>";

	// Stap 3
	$greeting = "PHP";
	$greeting = GREETING;
	echo "<h1>" . $greeting . "</h1>";

	// Stap 4
	$hello = "hello";
	$world = "world!";
	echo "<h1>" . $hello . " " . $world . "</h1>";
	?>
</body>
</html>