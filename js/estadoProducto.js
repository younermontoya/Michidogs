function editarEstadoProducto(e){
    var a = e.id;
    localStorage.setItem("id_producto",a);
}
document.getElementById("actualizarProducto").addEventListener("click",()=>{
    var id = localStorage.getItem("id_producto");
    var disponibilidad = document.getElementById("estadoProducto").value;
    location.href=`../../controllers/productos/modificarEstadoProducto.php?id=${id}&disponibilidad=${disponibilidad}`;
})