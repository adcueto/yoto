// const images = [
//     '../multimedia/img/bg2.webp',
//     '../multimedia/img/bg3.webp',
//     '../multimedia/img/bg1.webp'
//     // "{{ url_for('static', filename='multimedia/img/bg2.webp') }}",
//     // "{{ url_for('static', filename='multimedia/img/bg3.webp') }}",
//     // "{{ url_for('static', filename='multimedia/img/bg1.webp') }}" // Añade las rutas de tus otras imágenes
// ];

const images = [
    document.body.dataset.img1,
    document.body.dataset.img2,
    document.body.dataset.img3
];
// Variables de password
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
const eyeIcon = togglePassword.querySelector('.fa-eye');
const eyeSlashIcon = togglePassword.querySelector('.fa-eye-slash');

let currentImageIndex = 0;

function changeBackground() {
    document.body.style.backgroundImage = `url(${images[currentImageIndex]})`;
    currentImageIndex = (currentImageIndex + 1) % images.length;
}

setInterval(changeBackground, 6000); // Cambia de imagen cada 6 segundos

togglePassword.addEventListener('click', function () {
    // Cambia el tipo de la contraseña entre 'password' y 'text'
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // Alterna la visibilidad de los íconos
    eyeIcon.style.display = eyeIcon.style.display === 'none' ? 'inline' : 'none';
    eyeSlashIcon.style.display = eyeSlashIcon.style.display === 'none' ? 'inline' : 'none';
});


// Omitir caracteres no válidos al escribir
document.addEventListener("DOMContentLoaded", function () {
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");

    // Función para eliminar caracteres no válidos
    function sanitizeInput(event) {
        const invalidChars = /['"\s]/g; // Expresión regular para comillas y espacios
        event.target.value = event.target.value.replace(invalidChars, ''); // Reemplaza caracteres no válidos
    }

    usernameInput.addEventListener("input", sanitizeInput);
    passwordInput.addEventListener("input", sanitizeInput);
});