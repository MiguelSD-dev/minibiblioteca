<?php
// Configuración de la base de datos
$host = "localhost"; // Nombre del servidor de la base de datos (normalmente localhost)
$user = "root"; // Nombre de usuario de la base de datos
$pass = "1234"; // Contraseña de la base de datos
$db = "biblioteca"; // Nombre de la base de datos

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

?>