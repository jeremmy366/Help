<?php
session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient">
    <div class="container">
        <a class="navbar-brand" href="index.php">Exportación de Flores</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Dropdown para mostrar usuario y rol -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-2" style="font-size: 1.5rem;"></i> 
                        Bienvenido, <?php echo $usuario; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
                            <li class="dropdown-header text-muted small">
                                <i class="bi bi-person-badge me-2"></i> Información del Usuario
                            </li>
                            <li class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-person-fill me-2"></i> Nombre: <strong><?php echo $usuario; ?></strong>
                            </li>
                            <li class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-briefcase-fill me-2"></i> Rol: <strong><?php echo $rol; ?></strong>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-item text-danger d-flex align-items-center" style="cursor: pointer;">
                                 <li><a class="dropdown-item text-danger" href="login.php">Cerrar Sesión</a></li>
                            </li>
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
        <div class="flex-layout">
            <?php if ($rol == 'Administrador' || $rol == 'Gerente'): ?>
                <div class="feature-item">
                    <i class="bi bi-box-seam feature-icon"></i>
                    <h3>Productos</h3>
                    <a href="producto.php" class="btn btn-success">Acceder</a>
                </div>
                <div class="feature-item">
                    <i class="bi bi-truck feature-icon"></i>
                    <h3>Proveedores</h3>
                    <a href="proveedores.php" class="btn btn-success">Acceder</a>
                </div>
                <div class="feature-item">
                    <i class="bi bi-people feature-icon"></i>
                    <h3>Empleados</h3>
                    <a href="empleado.php" class="btn btn-success">Acceder</a>
                </div>
            <?php endif; ?>
            <?php if ($rol == 'Administrador' || $rol == 'Empleado'): ?>
                <div class="feature-item">
                    <i class="bi bi-person-check feature-icon"></i>
                    <h3>Clientes</h3>
                    <a href="#" class="btn btn-success">Acceder</a>
                </div>
            <?php endif; ?>
            <?php if ($rol == 'Administrador'): ?>
                <div class="feature-item">
                    <i class="bi bi-building feature-icon"></i>
                    <h3>Almacenes</h3>
                    <a href="almacenes.php" class="btn btn-success">Acceder</a>
                </div>
                <div class="feature-item">
                    <i class="bi bi-flower1 feature-icon"></i>
                    <h3>Flores</h3>
                    <a href="#" class="btn btn-success">Acceder</a>
                </div>
                <div class="feature-item">
                    <i class="bi bi-tags feature-icon"></i>
                    <h3>Categorías</h3>
                    <a href="#" class="btn btn-success">Acceder</a>
                </div>
                <div class="feature-item">
                    <i class="bi bi-person-gear feature-icon"></i>
                    <h3>Usuarios</h3>
                    <a href="usuarios.php" class="btn btn-success">Acceder</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p>&copy; 2025 Exportación de Flores - Todos los derechos reservados</p>
    </footer>
</body>

</html>