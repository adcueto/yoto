
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
const eyeIcon = togglePassword.querySelector('.fa-eye');
const eyeSlashIcon = togglePassword.querySelector('.fa-eye-slash');

togglePassword.addEventListener('click', function () {
    // Cambia el tipo de la contraseña entre 'password' y 'text'
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // Alterna la visibilidad de los íconos
    eyeIcon.style.display = eyeIcon.style.display === 'none' ? 'inline' : 'none';
    eyeSlashIcon.style.display = eyeSlashIcon.style.display === 'none' ? 'inline' : 'none';
});

document.getElementById('password').addEventListener('keydown', function(event) {
    const invalidChars = [' ']; // Aquí puedes agregar más caracteres que quieras prohibir
    if (invalidChars.includes(event.key)) {
        event.preventDefault(); // Evita que el carácter prohibido sea ingresado
    }
});
