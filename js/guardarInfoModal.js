$(document).ready(function() {
    $('.botonEditar').click(function(event) {
      var userId = $(this).data('id');
      // almacenar userId para usarlo en el modal y en la función PHP
    });
  });

  
  $(document).ready(function() {
    $('#actualizarUser').click(function(event) {
      var userId = $(this).data('id'); // Obtener ID del usuario
      var nuevoEstado = $('#estadoUsuario').val(); // Obtener el nuevo estado seleccionado
  
      // Enviar el ID del usuario y el nuevo estado al script PHP usando AJAX o fetch
    });
  });
    