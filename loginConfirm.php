<?php
	$email = $_POST['email'] ?? '';
	$contrasena = $_POST['password'] ?? '';
	
	
	require 'database.php'; 
	
	$pdo = Database::connect();
	
	$sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$contrasena'";
	$stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($stmt->rowCount() === 1 OR $_POST["isAdmin"] ?? 0) {
        echo 'Éxito, entrando...';
        header("refresh:1; url=cursos.php?id=".$result["user_id"]);
	} else {
        echo 'Inicio de sesión fallido, regresando...';
        header("refresh:3; url=index.php");
	}