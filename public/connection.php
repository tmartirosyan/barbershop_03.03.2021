<?php

$conn = "";

try {
	$servername = "localhost";
	$dbname = "Barbershop";
	$username = "root";
	$password = "usbw";
	$conn = new PDO(
		"mysql:host=$servername; dbname=Barbershop",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>
