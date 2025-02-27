<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="/Expor_Flores/CSS/estilos.css">
</head>
<body>
    <nav class="navbar navbar-light bg-primary p-3">
        <a href="menu.php" class="btn btn-light">⬅ Volver al Menú</a>
        <span class="navbar-brand mx-auto text-white fw-bold">Gestión de Usuarios</span>
    </nav>
    
    <div class="container mt-5">
        <h2 class="text-center text-primary">Gestión de Usuarios</h2>
        
        <!-- Formulario para Crear/Editar Usuario -->
        <div class="card p-4 mb-4">
            <h4>Crear Nuevo Usuario</h4>
            <form id="formUsuario">
                <input type="hidden" id="usuarioId" name="id">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Rol</label>
                    <select class="form-select" id="rol" name="rol" required>
                        <option value="Administrador">Administrador</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Empleado">Empleado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Guardar Usuario</button>
            </form>
        </div>

        <!-- Tabla de Usuarios -->
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaUsuariosBody"></tbody>
        </table>
    </div>

    <script src="../js/usuarios.js"></script>
</body>
</html>
