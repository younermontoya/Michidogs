
const nombre = sessionStorage.getItem('nombre');
const apellido = sessionStorage.getItem('apellido');
const documento = sessionStorage.getItem('documento');
const token =  sessionStorage.getItem('token');



// document.getElementById('nombre').textContent = nombre;
// document.getElementById('apellido').textContent = apellido;
// document.getElementById('documento').textContent = documento;
document.addEventListener('DOMContentLoaded', function() {
    displayTokenExpirationTime();
});

function displayTokenExpirationTime() {
    const token = sessionStorage.getItem('token');
    if (!token) {
        console.log('Token not found.');
        return;
    }

    const tokenPayload = JSON.parse(atob(token.split('.')[1]));
    const expirationTime = new Date(tokenPayload.exp * 1000);
    const currentTime = new Date();
    const timeRemaining = Math.floor((expirationTime - currentTime) / 1000); 

    if (timeRemaining > 0) {
        document.getElementById("layout").style.display="block"
        const minutesRemaining = Math.floor(timeRemaining / 60);
        const secondsRemaining = timeRemaining % 60;
        console.log(`Token expires in ${minutesRemaining} minutes and ${secondsRemaining} seconds.`);
    } else {
        console.log('Token has expired.');
    }
}
document.addEventListener('DOMContentLoaded', function() {
    const token = sessionStorage.getItem('token');
    if (!token) {
        redirectToLoginPage(); 
    }

    const tokenPayload = JSON.parse(atob(token.split('.')[1]));
    const expirationTime = new Date(tokenPayload.exp * 1000);
    const currentTime = new Date();

    if (currentTime >= expirationTime) {
        redirectToLoginPage(); 
        
        return;
    }

    
});

function redirectToLoginPage() {

    
    window.location.href = '/';
}



document.getElementById('salir').addEventListener('click', function() {

    
    sessionStorage.clear();

    
    redirectToLoginPage();
});