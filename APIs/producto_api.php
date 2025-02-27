<?php
session_start();
include '../db/conexion.php';

// Configurar la respuesta en formato JSON
header('Content-Type: application/json');

// Definir la tabla correcta
$tabla = 'expo_productos';

// Manejar solicitudes POST (crear y actualizar)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $id = $_POST['id'] ?? null;
    $datos = $_POST;
    unset($datos['accion'], $datos['id']);

    try {
        if ($accion == 'crear') {
            $columnas = implode(", ", array_keys($datos));
            $valores = implode(", ", array_fill(0, count($datos), '?'));
            $stmt = $pdo->prepare("INSERT INTO $tabla ($columnas) VALUES ($valores)");
            $stmt->execute(array_values($datos));
            echo json_encode(['mensaje' => 'Empleado agregado exitosamente']);
        } elseif ($accion == 'actualizar' && $id) {
            $set = implode(", ", array_map(fn($k) => "$k = ?", array_keys($datos)));
            $stmt = $pdo->prepare("UPDATE $tabla SET $set WHERE ID_Productos = ?"); //ID correspondiente de la tabla
            $stmt->execute([...array_values($datos), $id]);
            echo json_encode(['mensaje' => 'Producto actualizado exitosamente']);
        } else {
            echo json_encode(['error' => 'Acción no válida o ID no proporcionado']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
    exit();
}

// Manejar solicitudes DELETE (eliminar)
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);
    $id = $_DELETE['id'] ?? null;

    if ($id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM $tabla WHERE ID_Productos = ?");  //ID correspondiente de la tabla
            $stmt->execute([$id]);
            echo json_encode(['mensaje' => 'Producto eliminado exitosamente']);
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Error al eliminar el producto: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'ID no proporcionado para eliminar']);
    }
    exit();
}

// Manejar solicitudes GET (obtener datos)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $nombre = $_GET['nombre'] ?? '';

    try {
        if (!empty($nombre)) {
            $stmt = $pdo->prepare("SELECT * FROM $tabla WHERE Nombre LIKE ?");  //Campo de la tabla por buscar
            $stmt->execute(["%$nombre%"]);
        } else {
            $stmt = $pdo->query("SELECT * FROM $tabla");
        }

        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al obtener datos: ' . $e->getMessage()]);
    }
    exit();
}
?>
