document.getElementById('productoForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const formData = new FormData();
    formData.append('nombre', document.getElementById('nombre').value);
    formData.append('precio', document.getElementById('precio').value);
    formData.append('peso', document.getElementById('peso').value);
    formData.append('cantidad', document.getElementById('cantidad').value);
    formData.append('descripcion', document.getElementById('descripcion').value);
    formData.append('categoria', document.getElementById('categoria').value);
    formData.append('marca', document.getElementById('marca').value);
    formData.append('fechaVenci', document.getElementById('fechaVenci').value);
    formData.append('cantidad_max', document.getElementById('cantidad_max').value);
    formData.append('cantidad_min', document.getElementById('cantidad_min').value);
    formData.append('proveedor',"1");
    formData.append('foto1', document.getElementById('foto1').files[0]);
    formData.append('foto2', document.getElementById('foto2').files[0]);
    formData.append('foto3', document.getElementById('foto3').files[0]);
  
    
    // const fileInput = document.getElementById('foto');
    // const file = fileInput.files[0];
    // if (file.size > 90) {
    //     alert('El tamaño del archivo es demasiado grande.');
    //     console.log(file.size)
    // } else {
        
    // }

    try {
        const response = await axios.post('http://10.175.144.95:8080/productos', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });

        console.log('Producto creado:', response.data);
        alert('Producto creado exitosamente');
    } catch (error) {
        console.error('Error al crear el producto:', error);
        alert('Error al crear el producto');
    }
    
});
