let cardsData = [];
let arregloExterno = [];
let productosIndex= [];
// let pr=[]
// localStorage.setItem('productosSave', JSON.stringify(pr));

document.addEventListener("DOMContentLoaded", async function () {

  const page = document.body.getAttribute("data-page");

  switch (page) {
    case "verProductosProveedor":
      try {
        const response = await axios.get("http://localhost:8080/productos");
        const productos = response.data;

        const tabla = $("#tabla").DataTable();

        productos.forEach((producto) => {
          tabla.row
            .add([
              producto.id,
              producto.nombre,
              producto.marca,
              producto.precio,
              producto.estado,
              producto.cantidad_min,
              producto.cantidad_max,
              '<button class="btn btn-warning editar">Editar</button>',
              '<button class="btn btn-warning eliminar">Eliminar</button>',
            ])
            .draw();
        });
      } catch (error) {
        // console.error('Error al obtener los productos:', error);
        // alert('Error al obtener los productos');
      }
      break;

    case "verProductosAdmin":
      try {
        const response = await axios.get("http://localhost:8080/productos");
        const productos = response.data;
        console.log(productos);
        const tabla = $("#tabla").DataTable();
      
        productos.forEach((producto) => {
          tabla.row
            .add([
              producto.id,
              producto.nombre,
              producto.categoria,
              producto.precio,
              producto.estado,
              producto.cantidad,
              producto.proveedor,
              `<button type="button" class="btn btn-primary botonEditar" data-id="${producto.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">Modificar Estado</button>`,
            ])
            .draw();
        });
      

        $('#tabla tbody').on('click', '.botonEditar', function () {
          const productoId = $(this).attr('data-id'); 
          console.log('ID del producto:', productoId);
          localStorage.setItem("productoID",productoId);
          $('#exampleModal').attr('data-productoId', productoId); 
        });
      
      } catch (error) {
        console.error('Error al obtener los productos:', error);
        alert('Error al obtener los productos');
      }



    break;
    case "verProductosIndex":
      cargarCarrito();


      try {
        const response = await axios.get(
          "http://localhost:8080/productos/index"
        );
        const productos = response.data;
        productosIndex = productos;
        const carouselInner = document.getElementById("carousel-inner");
        let isFirstItem = true;
        const itemsPerRow = 4;
        var z=0;

        for (let i = 0; i < productos.length; i += itemsPerRow) {
          const carouselItem = document.createElement("div");
          carouselItem.classList.add("carousel-item");
          if (isFirstItem) {
            carouselItem.classList.add("active");
            isFirstItem = false;
          }

          const row = document.createElement("div");
          row.classList.add("row");

          for (let j = 0; j < itemsPerRow && i + j < productos.length; j++) {
            const producto = productos[i + j];

            const col = document.createElement("div");
            col.classList.add("col-md-3", "productosIndex");

            const productCard = document.createElement("div");
            productCard.classList.add("product-card");

            const img = document.createElement("img");
            img.src = `http://localhost:8080/productos/${producto.id}/imagen1`;
            img.alt = `Producto ${i + j + 1}`;
            img.height = 200;
            img.width = 130;
            console.log(img.src);

            const h5 = document.createElement("h5");
            h5.classList.add("mt-3");
            h5.textContent = producto.nombre;

            const p = document.createElement("p");
            p.textContent = producto.precio;

            const boton = document.createElement("button");
            boton.classList.add("botonAgregar");
            boton.id = `botonIndex_0${producto.id}`;
            boton.textContent = "Agregar al carrito";
            boton.setAttribute("onclick", "agregarProducto(this)");
            

            productCard.appendChild(img);
            productCard.appendChild(h5);
            productCard.appendChild(p);
            productCard.appendChild(boton);
            col.appendChild(productCard);
            row.appendChild(col);
            z++;
          }
          carouselItem.appendChild(row);
          carouselInner.appendChild(carouselItem);
        }


      } catch (error) {
        // console.error('Error al obtener los productos:', error);
        // alert('Error al obtener los productos');
      }
      break;
    case "verProductosCliente":

      


      cargarCarrito();
      ProductosCliente();

      break;

    default:
      break;
  }

});

// cargar carrito wey XD

const cargarCarrito = ()=>{

  const addEventListenersToButtons = (clonedContainer) => {
    const incrementButtons = clonedContainer.querySelectorAll('.btn-increment');
    const decrementButtons = clonedContainer.querySelectorAll('.btn-decrement');
  
    incrementButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        actualizarPrecio(1, e);
      });
    });
  
    decrementButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        actualizarPrecio(0, e);
      });
    });
  };

  var productosAgregados = JSON.parse(localStorage.getItem('productosSave'));

  console.log(productosAgregados);

  var auxCantidad = 0;

  if(productosAgregados!=null){
    productosAgregados.forEach(producto => {
      var contenedorOriginal = document.querySelector('.modalCompra .cart-item');
      var areaClonado = document.querySelector('.modalCompra');
      var contenedorClonado = contenedorOriginal.cloneNode(true);
      contenedorClonado.classList.remove('ocultar')
          var img = `http://localhost:8080/productos/${producto.id}/imagen1`
        // Cambiar los IDs de algunos elementos en el contenedor clonado
        contenedorClonado.querySelector('.img-fluid').src = img
        contenedorClonado.querySelector('.precioProducto').id = `idPrecio_0${producto.id}`;
        contenedorClonado.querySelector('.precioProducto').innerText ="Precio: $ "+ producto.comprado * producto.precio ;
        contenedorClonado.querySelector('.idPrecioFijo').id = `idPrecioFijo_0${producto.id}`;
        contenedorClonado.querySelector('.idPrecioFijo').innerText = producto.precio;
        contenedorClonado.querySelector('.nombreProducto').innerText =producto.nombre
        contenedorClonado.querySelector('.label').id = `idCantidad_0${producto.id}`;
        contenedorClonado.querySelector('.btn-increment').id = `idMas_0${producto.id}`;
        contenedorClonado.querySelector('.btn-decrement').id = `idMenos_0${producto.id}`;
        contenedorClonado.querySelector('.can').innerText =producto.comprado;
        var valorActual= parseInt(document.getElementById('cantidaTotal').innerText)
        document.getElementById('cantidaTotal').innerText= (valorActual) +  producto.precio ;
        var cantidadActual= parseInt(document.getElementById('cantidadProductos').innerText);
        document.getElementById('cantidadProductos').innerText=(cantidadActual) +  1;
        auxCantidad +=producto.comprado * producto.precio ;
        areaClonado.appendChild(contenedorClonado);
        
        // Agregar eventos a los botones en el contenedor clonado
        addEventListenersToButtons(contenedorClonado);
    });
    document.getElementById('cantidaTotal').innerText= auxCantidad; 
  
  }


  


} 

const actualizarPrecio = (operacion,e)=>{
  var idContenedor =  e.target.id;
  var idGeneral = idContenedor.substring(idContenedor.length - 2);
  var valorCantidad = 0;
  const idGeneralProcesado = parseInt(idGeneral, 10);
  var contenedorLabel = document.getElementById(`idCantidad_0${idGeneralProcesado}`);
  var valorActual = parseInt(contenedorLabel.innerText);
  if(operacion==1){
      valorCantidad = valorActual + 1
      contenedorLabel.innerText=valorCantidad;
  }else{
      if(valorActual==1){
          return
      }else{
          valorCantidad = valorActual - 1
          contenedorLabel.innerText=valorCantidad;
      }        
  }

  const productos = JSON.parse(localStorage.getItem('productosSave'));

  const productoEncontrado = productos.find(item => item.id === idGeneralProcesado);

  if (productoEncontrado) {
    productoEncontrado['comprado'] = valorCantidad;

    localStorage.setItem('productosSave', JSON.stringify(productos));
  }


  var contenedorPrecio = document.getElementById(`idPrecio_0${idGeneralProcesado}`);
  var contenedorPrecioFijo = parseInt(document.getElementById(`idPrecioFijo_0${idGeneralProcesado}`).innerText.replace(/\D/g, ""));
  contenedorPrecio.innerText = `Precio:  $ ${contenedorLabel.innerText*contenedorPrecioFijo}`;

  actualizarTotal();
}

const actualizarTotal = () => {
  let valorTotal = 0;

  const totalPago = document.querySelectorAll('.precioProducto');
  totalPago.forEach(t => {
    valorTotal += parseInt(t.innerText.replace(/\D/g, ""), 10);
  });


  document.getElementById('cantidaTotal').innerText = valorTotal;


};



function categoria(c) {
  sessionStorage.setItem("tipo_mascota", c);
  ProductosCliente();
}



function agregarProducto(e){

  const addEventListenersToButtons = (clonedContainer) => {
    const incrementButtons = clonedContainer.querySelectorAll('.btn-increment');
    const decrementButtons = clonedContainer.querySelectorAll('.btn-decrement');
    const deleteButtons = clonedContainer.querySelectorAll('')
  
    incrementButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        actualizarPrecio(1, e);
      });
    });
  
    decrementButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        actualizarPrecio(0, e);
      });
    });
  };
        
  var idBoton = e.id;
  
      
        
  var ultimosDosDigitos = idBoton.substring(idBoton.length - 2);
  
 
  if (ultimosDosDigitos.substring(0, 1) === "0") {
      ultimosDosDigitos = ultimosDosDigitos.substring(1); 
  }

  ultimosDosDigitos = parseInt(ultimosDosDigitos);

  var contenedorOriginal = document.querySelector('.modalCompra .cart-item');
  var areaClonado = document.querySelector('.modalCompra');
  var contenedorClonado = contenedorOriginal.cloneNode(true);
  contenedorClonado.classList.remove('ocultar')
  const producto = productosIndex.find(item => item.id === ultimosDosDigitos);

  if (!producto) {
    alert("el producto no se pudo agregar");
  }else{

    // if (localStorage.getItem('productosSave')) {
      console.log('La variable productosSave existe en localStorage');
      var ar = JSON.parse(localStorage.getItem('productosSave'));
  
          var productoExiste = ar.some(function(item) {
            return item.id === producto.id;
          });
  
          if (!productoExiste) {
            producto['comprado'] =1;
            ar.push(producto);
            localStorage.setItem('productosSave', JSON.stringify(ar));
             
          
              var img = `http://localhost:8080/productos/${producto.id}/imagen1`
              // Cambiar los IDs de algunos elementos en el contenedor clonado
              contenedorClonado.querySelector('.img-fluid').src = img
              contenedorClonado.querySelector('.precioProducto').id = `idPrecio_0${producto.id}`;
              contenedorClonado.querySelector('.precioProducto').innerText ="Precio: $ "+ producto.precio ;
              contenedorClonado.querySelector('.idPrecioFijo').id = `idPrecioFijo_0${producto.id}`;
              contenedorClonado.querySelector('.idPrecioFijo').innerText = producto.precio;
              contenedorClonado.querySelector('.nombreProducto').innerText =producto.nombre
              contenedorClonado.querySelector('.label').id = `idCantidad_0${producto.id}`;
              contenedorClonado.querySelector('.btn-increment').id = `idMas_0${producto.id}`;
              contenedorClonado.querySelector('.btn-decrement').id = `idMenos_0${producto.id}`;
              var valorActual= parseInt(document.getElementById('cantidaTotal').innerText)
              document.getElementById('cantidaTotal').innerText= (valorActual) +  producto.precio ;
              var cantidadActual= parseInt(document.getElementById('cantidadProductos').innerText);
              document.getElementById('cantidadProductos').innerText=(cantidadActual) +  1;
          
              areaClonado.appendChild(contenedorClonado);
              
              // Agregar eventos a los botones en el contenedor clonado
              addEventListenersToButtons(contenedorClonado);
  
          } else {
            alert("El producto ya está en el carrito.");
          }
  
    // }
  }


 
}


const ProductosCliente = async () => {
  cardsData = [];
  var categoria = sessionStorage.getItem("categoria");
  var tipo_mascota = sessionStorage.getItem("tipo_mascota");
  console.log(categoria);
  console.log(tipo_mascota);

  try {
    const response = await axios.get(
      `http://localhost:8080/productos/cliente/${categoria}/${tipo_mascota}`
    );
    var arregloInterno = [];
    var data = response.data;
    productosIndex = data;

    console.log(data);

    data.forEach((e) => {
      var idProducto = e.id;
      var nombre = e.nombre;
      var descripcion = e.descripcion;
      var img = `http://localhost:8080/productos/${e.id}/imagen1`;
      var precio = e.precio;
      arregloInterno.push({ nombre, descripcion, img, precio,idProducto });
    });

    mostrarProductosIndex(arregloInterno);

    // Display the updated cards
    displayCards(1);
    generatePagination();
  } catch (error) {
    console.error("Error del servidor:", error);
    alert("Error del servidor");
  }
};

const mostrarProductosIndex = (arreglo) => {
  arregloExterno = arreglo;

  arregloExterno.forEach((e) => {
    console.log("arreglo de prueba")
    addCard(e.nombre, e.descripcion, e.img, e.precio,e.idProducto);
  });
};

// Mostrar el arreglo lleno
console.log(cardsData);

// Número de tarjetas por página
const cardsPerPage = 6;
let totalPages = Math.ceil(cardsData.length / cardsPerPage);

// Función para mostrar las tarjetas
function displayCards(page) {
  const start = (page - 1) * cardsPerPage;
  const end = start + cardsPerPage;
  const cardsToShow = cardsData.slice(start, end);

  $("#card-container").empty();

  cardsToShow.forEach((card) => {
    const cardHTML = `
                  <div class="col-12 col-md-6 col-lg-4">
                      <div class="card">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="${card.img}" class="card-img-top" alt="${card.title}">
                            </button>
                          <div class="card-body">
                              <h3 class="card-title">${card.title}</h3>
                               <p class="card-text">${card.precio}</p>
                              <p class="card-text">${card.text}</p>
                             <button class="botonAgregar" id="botonIndex_0${card.id}" onclick="agregarProducto(this)"  >Agregar al carrito</button>
                          </div>
                      </div>
                  </div>
              `;
    $("#card-container").append(cardHTML);
  });
}

document.getElementById('card.id').addEventListener('click', function() {
  var productId = document.getElementById('productIdInput').value;
  fetchProductoById(productId);
});


// Función para generar el paginador
function generatePagination() {
  totalPages = Math.ceil(cardsData.length / cardsPerPage);
  $("#pagination").empty();

  $("#pagination").append(
    '<li class="page-item disabled" id="prev-page"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>'
  );

  for (let i = 1; i <= totalPages; i++) {
    if (i == 1) {
      $("#pagination").append(
        `<li class="page-item active"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`
      );
    } else {
      $("#pagination").append(
        `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`
      );
    }
  }

  $("#pagination").append(
    '<li class="page-item" id="next-page"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>'
  );
}

// Inicializar la primera página
displayCards(1);
generatePagination();

// Manejar la navegación del paginador
$(document).on("click", ".page-link", function (e) {
  e.preventDefault();
  const page = $(this).data("page");
  if (!page) return;

  $(".page-item").removeClass("active");
  $(this).parent().addClass("active");

  displayCards(page);
  updatePaginationState(page);
});

$(document).on("click", "#prev-page", function (e) {
  e.preventDefault();
  const currentPage = $(".page-item.active .page-link").data("page");
  if (currentPage > 1) {
    displayCards(currentPage - 1);
    $(`.page-link[data-page="${currentPage - 1}"]`)
      .parent()
      .addClass("active")
      .siblings()
      .removeClass("active");
    updatePaginationState(currentPage - 1);
  }
});

$(document).on("click", "#next-page", function (e) {
  e.preventDefault();
  const currentPage = $(".page-item.active .page-link").data("page");
  if (currentPage < totalPages) {
    displayCards(currentPage + 1);
    $(`.page-link[data-page="${currentPage + 1}"]`)
      .parent()
      .addClass("active")
      .siblings()
      .removeClass("active");
    updatePaginationState(currentPage + 1);
  }
});

// Función para actualizar el estado del paginador
function updatePaginationState(page) {
  if (page === 1) {
    $("#prev-page").addClass("disabled");
  } else {
    $("#prev-page").removeClass("disabled");
  }

  if (page === totalPages) {
    $("#next-page").addClass("disabled");
  } else {
    $("#next-page").removeClass("disabled");
  }
}

// Inicializar el estado del paginador
updatePaginationState(1);

function addCard(title, text, img, precio,id) {
  cardsData.push({ title, text, img, precio,id});
}

$(document).on("click", ".editar", function () {
  const fila = $(this).closest("tr");

  const id = fila.find("td:eq(0)").text();
  const nombre = fila.find("td:eq(1)").text();
  const marca = fila.find("td:eq(2)").text();
  const precio = fila.find("td:eq(3)").text();
  const disponibilidad = fila.find("td:eq(4)").text();
  const stockMinimo = fila.find("td:eq(5)").text();
  const stockMaximo = fila.find("td:eq(6)").text();

  $("#exampleModal").modal("show");
  $("#id").val(id);
  $("#nombre-producto").val(nombre);
  $("#marca").val(marca);
  $("#precio").val(precio);
  $("#disponibilidad").val(disponibilidad);
  $("#stock-minimo").val(stockMinimo);
  $("#stock-maximo").val(stockMaximo);

  $("#guardar-cambios").attr("data-id", id);
});

$("#guardar-cambios").click(function () {
  const id = $(this).attr("data-id");

  const nombre = $("#nombre-producto").val();
  const marca = $("#marca").val();
  const precio = $("#precio").val();
  const disponibilidad = $("#disponibilidad").val();
  const stockMinimo = $("#stock-minimo").val();
  const stockMaximo = $("#stock-maximo").val();

  console.log("ID:", id);
  console.log("Nombre:", nombre);
  console.log("Marca:", marca);
  console.log("Precio:", precio);
  console.log("Disponibilidad:", disponibilidad);
  console.log("Stock mínimo:", stockMinimo);
  console.log("Stock máximo:", stockMaximo);

  $("#exampleModal").modal("hide");
});

$("#guardar-cambios").click(function () {
  const id = $("#id").val();
  const nombre = $("#nombre-producto").val();
  const marca = $("#marca").val();
  const precio = $("#precio").val();
  const disponibilidad = $("#disponibilidad").val();
  const stockMinimo = $("#stock-minimo").val();
  const stockMaximo = $("#stock-maximo").val();

  const datosActualizados = {
    nombre: nombre,
    marca: marca,
    precio: precio,
    disponibilidad: disponibilidad,
    stock_min: stockMinimo,
    stock_max: stockMaximo,
  };

  axios
    .patch(`http://localhost:8080/productos/update/${id}`, datosActualizados)
    .then((response) => {
      console.log("Respuesta del servidor:", response.data);

      alert("Los cambios se guardaron correctamente");
      window.location.reload();
    })
    .catch((error) => {
      console.error("Error al guardar los cambios:", error);
      alert("Error al guardar los cambios");
    });

  $("#exampleModal").modal("hide");
});

$(document).on("click", ".eliminar", function () {
  const fila = $(this).closest("tr");

  const id = fila.find("td:eq(0)").text();

  if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
    axios
      .patch(`http://localhost:8080/productos/eliminar/${id}`)
      .then((response) => {
        console.log("Respuesta del servidor:", response.data);
        alert("El producto se eliminó correctamente");
        window.location.reload();
      })
      .catch((error) => {
        console.error("Error al eliminar el producto:", error);
        alert("Error al eliminar el producto");
      });
  }
});

$("#productoForm").on("submit", async function (event) {
  event.preventDefault();

  const formData = new FormData();
  formData.append("nombre", document.getElementById("nombre").value);
  formData.append("precio", document.getElementById("precio").value);
  formData.append("peso", document.getElementById("peso").value);
  formData.append("cantidad", document.getElementById("cantidad").value);
  formData.append("descripcion", document.getElementById("descripcion").value);
  formData.append("categoria", document.getElementById("categoria").value);
  formData.append(
    "tipo_mascota",
    document.getElementById("tipo_mascota").value
  );
  formData.append("marca", document.getElementById("marca").value);
  formData.append("fechaVenci", document.getElementById("fechaVenci").value);
  formData.append(
    "cantidad_max",
    document.getElementById("cantidad_max").value
  );
  formData.append(
    "cantidad_min",
    document.getElementById("cantidad_min").value
  );
  formData.append("proveedor", "1");
  formData.append("foto1", document.getElementById("foto1").files[0]);
  formData.append("foto2", document.getElementById("foto2").files[0]);
  formData.append("foto3", document.getElementById("foto3").files[0]);

  try {
    const response = await axios.post(
      "http://localhost:8080/productos",
      formData,
      {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      }
    );

    console.log("Producto creado:", response.data);
    alert("Producto creado exitosamente");
  } catch (error) {
    alert("Error al crear el producto");
  }
});

function cambiarEstado(e){
  var estado = document.getElementById('estadoProducto').value;
  var id = localStorage.getItem('productoID')

  if (confirm("¿Estás seguro de que deseas cambiar el estado?")) {
    axios
      .patch(`http://localhost:8080/productos/cambiarEstado/${id}/${estado}`)
      .then((response) => {
        console.log("Respuesta del servidor:", response.data);
        alert("El producto se modificó correctamente");
        window.location.reload();
      })
      .catch((error) => {
        console.error("Error al eliminar el producto:", error);
        alert("Error al eliminar el producto");
      });
  }



}

