document.addEventListener("DOMContentLoaded", cargarDatos);

function cargarDatos() {
    let nombre = document.getElementById("buscarProducto").value; // Metodo buscra de la vista
    let url = "../Gateway/gateway.php?api=productos"; // Nombre del case del Gateway

    if (nombre) {
        url += `&nombre=${encodeURIComponent(nombre)}`;
    }

    fetch(url)
        .then(res => res.json())
        .then(data => {
            let body = document.getElementById("tablaBody");
            body.innerHTML = "";
            data.forEach(row => {
                body.innerHTML += `<tr>
                    <td>${row.ID_Productos}</td>
                    <td>${row.Nombre}</td>
                    <td>${row.Cantidad}</td>
                    <td>${row.Precio}</td>
                    <td>
                        <button class='btn btn-warning btn-sm' onclick="editarProducto(${row.ID_Productos}, '${row.Nombre}', '${row.Cantidad}', '${row.Precio}')">Editar</button> <!-- CAMBIAR el editar -->
                        <button class='btn btn-danger btn-sm' onclick="eliminarProducto(${row.ID_Productos})">Eliminar</button> <!-- CAMBIAR el eliminar -->
                    </td>
                </tr>`;
            });
        });
}

function editarProducto(id, nombre, cantidad, precio) { // Nombre del boton editar
    document.getElementById('productoId').value = id; // ID de la vista que se puso
    document.getElementById('nombre').value = nombre;
    document.getElementById('cantidad').value = cantidad;
    document.getElementById('precio').value = precio;
}

function eliminarProducto(id) { // Nombre del boton eliminar
    if (!confirm("¿Seguro que quieres eliminar este producto?")) return;
    
    fetch(`../Gateway/gateway.php?api=productos`, { // Nombre del case del Gateway
        method: "DELETE",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `id=${id}`
    }).then(() => cargarDatos());
}

document.getElementById("formProducto").addEventListener("submit", function(event) { // Nombre del form de la vista
    event.preventDefault();

    let formData = new FormData(this);
    let id = document.getElementById("productoId").value; // ID de la vista que se puso
    let accion = id ? "actualizar" : "crear";
    formData.append("accion", accion);

    fetch("../Gateway/gateway.php?api=productos", { // Nombre del case del Gateway
        method: "POST",
        body: new URLSearchParams(formData)
    }).then(() => {
        this.reset();
        document.getElementById("productoId").value = ""; // ID de la vista que se puso
        cargarDatos();
    });
});
