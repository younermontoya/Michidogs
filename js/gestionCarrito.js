document.addEventListener('DOMContentLoaded', function() {
    renderizarCarrito();

});

function mostrarModal(idProducto,precio) {
    console.log(precio);
    $.ajax({
        url: '../../controllers/administrador/carrito.php',
        method: 'POST',
        data:{
            id: idProducto,
            action: "carritoNueva"
        },
        success:(response)=>{
            let  respuesta = JSON.parse(response);
            agregarProducCarrito(respuesta.idCarrito,idProducto,precio);
        },
        error:(error)=>{
            console.error("el error")
    
        }
        
    })
    
}

const agregarProducCarrito = (idCarrito,idProducto,precio)=>{
    $.ajax({
        url: '../../controllers/administrador/carrito.php',
        method: 'POST',
        data:{
            idCarrito: idCarrito,
            idProducto: idProducto,
            precio:precio,
            action: "agregarProducto"
        },
        success:(response)=>{
            let  respuesta = JSON.parse(response);
            renderizarCarrito();
        },
        error:(error)=>{
            console.error("el error")
    
        }
        
    })

}

const renderizarCarrito = ()=>{
    $.ajax({
        url: '../../controllers/administrador/carrito.php',
        method: 'POST',
        data:{
            action:"renderizarCarrito"
        },
        success:(response)=>{
            let  respuesta = JSON.parse(response);
            const contenedorProductos = document.querySelector('.product-list');
            console.log(respuesta);
            document.getElementById("cart-total").innerHTML=0;
            document.getElementById("cantidadProductos").innerHTML=0;
            contenedorProductos.innerHTML = '';
            
         
            respuesta.forEach(producto => {
            
                const productoItem = document.createElement('div');
                productoItem.className = 'product-item';
                
 
                const productoImg = document.createElement('img');
                productoImg.src = producto.pro_img;
                productoImg.alt = producto.pro_nombre;
                productoImg.className = 'product-image';
            
    
                const productoDetails = document.createElement('div');
                productoDetails.className = 'product-details';
                

                const productoName = document.createElement('h3');
                productoName.className = 'product-name';
                productoName.textContent = producto.pro_nombre;
                
         
                const quantityContainer = document.createElement('div');
                quantityContainer.className = 'quantity-container';
                
            
                const decreaseButton = document.createElement('button');
                decreaseButton.className = 'quantity-button decrease-button';
                decreaseButton.textContent = '-';
                decreaseButton.dataset.idProducto = producto.pro_id; 
                decreaseButton.dataset.idCarrito = producto.id_carrito;
                decreaseButton.setAttribute('onclick', 'actualizarCantidad(this,1)');
  
                const quantityField = document.createElement('input');
                quantityField.className = 'quantity-field';
                quantityField.type = 'text';
                quantityField.id = `cantidadProducto${producto.pro_id}`
                quantityField.value = producto.cantidad_product;
                
 
                const increaseButton = document.createElement('button');
                increaseButton.className = 'quantity-button increase-button';
                increaseButton.textContent = '+';
                increaseButton.dataset.idProducto = producto.pro_id; 
                increaseButton.dataset.idCarrito = producto.id_carrito;
                increaseButton.setAttribute('onclick', 'actualizarCantidad(this,2)');

                quantityContainer.appendChild(decreaseButton);
                quantityContainer.appendChild(quantityField);
                quantityContainer.appendChild(increaseButton);
            
             
                const productoPrice = document.createElement('p');
                productoPrice.className = 'product-price';
                productoPrice.textContent = `Precio: $${producto.precio_product}`;
            

                const removeButton = document.createElement('button');
                removeButton.className = 'remove-button';
                removeButton.textContent = 'Eliminar';
                removeButton.dataset.idProducto = producto.pro_id; 
                removeButton.dataset.idCarrito = producto.id_carrito;
                removeButton.setAttribute('onclick', 'eliminarProducto(this)');
              
            
           
                productoDetails.appendChild(productoName);
                productoDetails.appendChild(quantityContainer);
                productoDetails.appendChild(productoPrice);

                productoItem.appendChild(productoImg);
                productoItem.appendChild(productoDetails);
                productoItem.appendChild(removeButton);
            

                contenedorProductos.appendChild(productoItem);

                document.getElementById("cantidadProductos").innerHTML= respuesta.length
                document.getElementById("cart-total").innerHTML=producto.total;
            });
        },
        error:(error)=>{
            console.error("el error")
    
        }
        
    })

}

const eliminarProducto = (e)=>{
    let idProducto  = e.dataset.idProducto;
    let idCarrito = e.dataset.idCarrito
    $.ajax({
        url: '../../controllers/administrador/carrito.php',
        method: 'POST',
        data:{
            idCarrito: idCarrito,
            idProducto: idProducto,
            action: "eliminarProducto"
        },
        success:(response)=>{
            let  respuesta = JSON.parse(response);
            renderizarCarrito();
        },
        error:(error)=>{
            console.error("el error")
    
        }
        
    })
}

const actualizarCantidad = (e,accion)=>{

    let idProducto =e.dataset.idProducto
    let contenedorCantidad =  document.getElementById(`cantidadProducto${idProducto}`);
    let cantidad = contenedorCantidad.value;
    let idCarrito = e.dataset.idCarrito;
  
    if(accion===1){
        if(cantidad == 1){
            return 
        }
        cantidad--;
    }else{
        cantidad++;
    }


    $.ajax({
        url: '../../controllers/administrador/carrito.php',
        method: 'POST',
        data:{
            cantidad: cantidad,
            idProducto: idProducto,
            idCarrito: idCarrito,
            action: "actulizarCantidad"
        },
        success:(response)=>{
            let  respuesta = JSON.parse(response);
            if(respuesta.success == "El producto agotó su stock"){
                alert("El producto agotó su stock");
            }else{
               renderizarCarrito();
            }
        },
        error:(error)=>{
            console.error("el error")
    
        }
        
    })
}
