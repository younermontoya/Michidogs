document.getElementById('formProducto').addEventListener('submit', () =>{
    var pro_id = document.getElementById('pro_id');
    location.href =`../../controllers/productos/registrarProducto.php?pro_id=${pro_id}`;
})
