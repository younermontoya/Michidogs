
  document.getElementById('formularioRegistro').addEventListener('submit', function(event) {
    var emailInput = document.getElementById('usuCorreo');
    var emailValue = emailInput.value;
    
    // Validación básica de formato
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailValue)) {
      alert('El formato del correo electrónico es incorrecto.');
      event.preventDefault(); // Evita el envío del formulario
      return;
    }
    
    // Validación de dominio específico (ejemplo con @gmail.com)
    if (!emailValue.endsWith('@gmail.com')) {
      alert('El correo electrónico debe tener el dominio @gmail.com.');
      event.preventDefault(); // Evita el envío del formulario
      return;
    }
    
    // Aquí puedes agregar una validación adicional para verificar si el correo ya está registrado
    // En este ejemplo, simplemente simulamos una verificación
    var existingEmails = ['example@gmail.com']; // Lista simulada de correos ya registrados
    if (existingEmails.includes(emailValue)) {
      alert('El correo electrónico ya está registrado.');
      event.preventDefault(); // Evita el envío del formulario
      return;
    }
  });