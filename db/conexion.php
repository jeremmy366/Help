<?php
// Archivo: conexion.php

// Configuración de la base de datos
$host = '127.0.0.1'; // Servidor (Evita problemas con sockets)
$dbname = 'exportacion_flores'; // Nombre de la base de datos
$user = 'root'; // Usuario de MySQL
$password = ''; // Contraseña (cambiar si MySQL requiere una)
$port = 3307; // Puerto de MySQL (cambiar si es diferente)

try {
    // Crear la conexión PDO con puerto especificado
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Habilitar excepciones para errores
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Configurar el modo de obtención de datos
    ]);
    
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
