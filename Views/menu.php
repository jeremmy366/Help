<?php 
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || !isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Exportación de Flores</title>
    <link rel="stylesheet" href="/Expor_Flores/CSS/estilos.css">
    <!-- Iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Exportación de Flores</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Dropdown para mostrar usuario y rol -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Bienvenido, <?php echo $usuario; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><span class="dropdown-item">Rol: <?php echo $rol; ?></span></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="login.php">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 text-center">
        <h1 class="text-primary fw-bold">Menú Principal</h1>
        <p class="text-secondary lead">Seleccione una opción para continuar</p>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">

            <!-- Acceso para Administrador y Gerente -->
            <?php if ($rol == 'Administrador' || $rol == 'Gerente') : ?>
                <div class="col-md-3">
                    <div class="card custom-card p-3 text-center">
                        <h3>Productos</h3>
                        <a href="producto.php" class="btn custom-button">Acceder</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card custom-card p-3 text-center">
                        <h3>Proveedores</h3>
                        <a href="proveedores.php" class="btn custom-button">Acceder</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card custom-card p-3 text-center">
                        <h3>Empleados</h3>
                        <a href="empleado.php" class="btn custom-button">Acceder</a>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Acceso para Empleado -->
            <?php if ($rol == 'Administrador' || $rol == 'Empleado') : ?>
                <div class="col-md-3">
                    <div class="card custom-card p-3 text-center">
                        <h3>Clientes</h3>
                        <a href="#" class="btn custom-button">Acceder</a>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Acceso exclusivo para Administrador -->
            <?php if ($rol == 'Administrador') : ?>
                <div class="col-md-3">
                    <div class="card custom-card p-3 text-center">
                        <h3>Almacenes</h3>
                        <a href="almacenes.php" class="btn custom-button">Acceder</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card custom-card p-3 text-center">
                        <h3>Flores</h3>
                        <a href="#" class="btn custom-button">Acceder</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card custom-card p-3 text-center">
                        <h3>Categorías</h3>
                        <a href="#" class="btn custom-button">Acceder</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card custom-card p-3 text-center">
                        <h3>Usuarios</h3>
                        <a href="usuarios.php" class="btn custom-button">Acceder</a>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p>&copy; 2025 Exportación de Flores - Todos los derechos reservados</p>
    </footer>
</body>
</html>
