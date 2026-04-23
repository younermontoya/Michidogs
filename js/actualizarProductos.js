document.getElementById('productoForm').addEventListener('submit',function(e){
    e.preventDefault();

    const id = document.getElementById('id').value;
    const nombre = document.getElementById('nombre').value;
    const disponibilidad = document.getElementById('disponibilidad').value;
    const precio = document.getElementById('precio').value;
    const stock_min = document.getElementById('stock_min').value;
    const stock_max = document.getElementById('stock_max').value;

    const productoUpdateDTO = {};
    if(nombre) productoUpdateDTO.nombre = nombre;
    if(descripcion) productoUpdateDTO.descripcion = descripcion;
    if(precio) productoUpdateDTO.precio = parseFloat(precio);

    axios.patch('http://10.175.144.95:8080/api/productos/id/${id}',productoUpdateDTO)
    .then(response=>{
        if (response.status===200){
            alert('Producto actualizado con exito');
            console.log(response.data);
        }else {
            throw new Error ('Error al actualizar el producto');
        }
    })
    .catch(error => {
        alert('Error: '+error.message);
        console.error(error);
    })

})