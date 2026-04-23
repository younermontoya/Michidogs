// document.getElementById("mi-enlace").onclick = function(event) {
//     event.preventDefault();
//     alert("¡Enlace presionado!");
// };

function botonEditar(e){
    var a = e.id;
    localStorage.setItem("id_usuario",a);
}
document.getElementById("actualizarUser").addEventListener("click", () =>{
    var id = localStorage.getItem("id_usuario");
    var estado = document.getElementById("estadoUsuario").value;
    location.href =`../../controllers/administrador/modificarEstado.php?id=${id}&estado=${estado}`;
})

