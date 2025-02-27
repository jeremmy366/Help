document.addEventListener("DOMContentLoaded", cargarUsuarios);

function cargarUsuarios() {
    let url = "../Gateway/gateway.php?api=usuarios";

    fetch(url)
        .then(res => res.json())
        .then(data => {
            let body = document.getElementById("tablaUsuariosBody");
            body.innerHTML = "";
            data.forEach(user => {
                body.innerHTML += `<tr>
                    <td>${user.id}</td>
                    <td>${user.nombre}</td>
                    <td>${user.email}</td>
                    <td>${user.rol}</td>
                    <td>
                        <button class='btn btn-warning btn-sm' onclick="editarUsuario(${user.id}, '${user.nombre}', '${user.email}', '${user.rol}')">Editar</button>
                        <button class='btn btn-danger btn-sm' onclick="eliminarUsuario(${user.id})">Eliminar</button>
                    </td>
                </tr>`;
            });
        });
}

function editarUsuario(id, nombre, email, rol) {
    document.getElementById('usuarioId').value = id;
    document.getElementById('nombre').value = nombre;
    document.getElementById('email').value = email;
    document.getElementById('rol').value = rol;
}

function eliminarUsuario(id) {
    if (!confirm("¿Seguro que quieres eliminar este usuario?")) return;

    fetch(`../Gateway/gateway.php?api=usuarios`, {
        method: "DELETE",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `id=${id}`
    }).then(() => cargarUsuarios());
}

document.getElementById("formUsuario").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData(this);
    let id = document.getElementById("usuarioId").value;
    let accion = id ? "actualizar" : "crear";
    formData.append("accion", accion);

    fetch("../Gateway/gateway.php?api=usuarios", {
        method: "POST",
        body: new URLSearchParams(formData)
    }).then(() => {
        this.reset();
        document.getElementById("usuarioId").value = "";
        cargarUsuarios();
    });
});
