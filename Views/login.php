<?php
session_start();
include '../db/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['usuario'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: menu.php");
        exit();
    } else {
        echo "<script>alert('Correo o contraseña incorrectos'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Exportación de Flores</title>
    <link rel="stylesheet" href="../lib/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>
<nav class="navbar navbar-light bg-primary p-3">
        <a href="index.php" class="btn btn-light">⬅ Volver</a>
        <span class="navbar-brand mx-auto text-white fw-bold"></span>
    </nav>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card custom-card p-4 text-center" style="width: 400px;">
            <div class="mb-3">
                <span style="font-size: 60px;">👤</span>
            </div>
            <h2 class="text-center text-primary">Iniciar Sesión</h2>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn custom-button">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
