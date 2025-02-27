<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Exportación de Flores</title>
    <link rel="stylesheet" href="/Expor_Flores/CSS/estilos.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-light bg-primary p-3">
        <a href="menu.php" class="btn btn-light">⬅ Volver al Menú</a>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center text-primary">Gestión de Exportación de Flores</h2>
        <div class="mb-3">
            <label class="form-label">Buscar Producto</label>
            <input type="text" class="form-control" id="buscarProducto" placeholder="Ingrese nombre"> <!-- Cambio del ID para buscar -->
        </div>
        <button class="btn btn-primary mb-3" onclick="cargarDatos()">Buscar</button>

        <!-- Formulario para agregar o actualizar empleados -->
        <div class="card p-4 mb-4 shadow">
            <form id="formProducto"> <!-- Cambio del nombre del formulario -->
                <input type="hidden" name="id" id="productoId"> <!-- Cambio del ID -->
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad" id="cantidad" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Guardar Producto</button>
            </form>
        </div>

        <!-- Tabla para mostrar los empleados registrados -->
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaBody"></tbody>
        </table>
    </div>

    <!-- Enlace al archivo JavaScript para la funcionalidad de la página -->
    <script src="../js/producto.js"></script>
</body>
</html>
