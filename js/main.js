


let capturarAncho = () => {
    let productos = document.getElementsByClassName('productosIndex');
    let ancho = window.innerWidth;
    
    if (ancho < 1400) {
       
        for (let i = 0; i < productos.length; i++) {
            productos[i].classList.remove('col-md-3');
            productos[i].classList.add('col-md-6');
        }
    } else {
   
        for (let i = 0; i < productos.length; i++) {
            productos[i].classList.remove('col-md-3', 'col-md-6');
            productos[i].classList.add('col-md-3');
        }
    }
}



window.addEventListener('resize',capturarAncho);





document.addEventListener("DOMContentLoaded", function() {
    // Mostrar loading cuando la página se está cargando
    var loading = document.getElementById('loading');
    window.addEventListener('beforeunload', function() {
      loading.style.display = 'block';
    });
    
   
      loading.style.display = 'none';
  
  });
  