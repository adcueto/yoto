document.getElementById("user-icon").addEventListener("click", function() {
    var dropdown = document.getElementById("dropdown-menu");
    // Cambia entre mostrar y ocultar el menú desplegable
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
});

// Opción para cerrar sesión (puedes agregar funcionalidad adicional aquí)
document.getElementById("dropdown-menu").addEventListener("click", function() {
    alert("Cerrando sesión...");
    // Aquí puedes redirigir o realizar otras acciones
});