<?php
// Configurar la respuesta en formato JSON
header('Content-Type: application/json');

// Captura el método de la solicitud HTTP (GET, POST, PUT, DELETE)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Captura el valor del parámetro "api" enviado en la URL
$requestedApi = $_GET['api'] ?? '';

// Determinar qué API se debe llamar según el valor del parámetro "api"
switch ($requestedApi) {
    case 'productos':
        $apiUrl = realpath(__DIR__ . '/../APIs/producto_api.php');
        break;
    case 'usuarios':
            $apiUrl = realpath(__DIR__ . '/../APIs/usuarios_api.php');
        break;
    default:
        // Si el parámetro "api" no es válido, devolver un error 400
        http_response_code(400);
        echo json_encode(['error' => 'API no especificada o incorrecta']);
        exit();
}

// Verificar si el archivo de la API existe
if (!$apiUrl || !file_exists($apiUrl)) {
    http_response_code(500);
    echo json_encode(['error' => 'El archivo de la API no existe']);
    exit();
}

// Capturar el cuerpo de las solicitudes PUT y DELETE
if ($requestMethod == 'PUT' || $requestMethod == 'DELETE') {
    parse_str(file_get_contents('php://input'), $_REQUEST);
}

// Validar que solo se permitan los métodos GET, POST, PUT y DELETE
if (in_array($requestMethod, ['GET', 'POST', 'PUT', 'DELETE'])) {
    include $apiUrl;
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}
?>