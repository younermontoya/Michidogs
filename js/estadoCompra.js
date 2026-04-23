function editarEstadoCompra(b){
    var a = b.id;
    localStorage.setItem("id_producto",a);
}
document.getElementById("actualizarEstadoCompra").addEventListener("click",()=>{
    var id = localStorage.getItem("id_producto");
    var estadoCompra = document.getElementById("estadoCompra").value;
    console.log(id,estadoCompra);
    location.href=`../../controllers/productos/modificarEstadoCompra.php?id=${id}&estadoCompra=${estadoCompra}`;
})