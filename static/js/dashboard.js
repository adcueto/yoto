document.getElementById('dark-mode').addEventListener('change', function() {
    // Obtener los elementos del sidebar y el botón deslizante
    const sidebar = document.querySelector('.sidebar');
    const slideButton = document.querySelector('.slide-button');
    const activeMenuItems = document.querySelectorAll('.menu-item.active');

    if (this.checked) {
        // Si el checkbox está activado (modo oscuro)
        sidebar.classList.add('dark-mode');
        slideButton.classList.add('dark-mode');
        activeMenuItems.forEach(item => {
            item.classList.add('dark-mode');
        });
    } else {
        // Si el checkbox está desactivado (modo normal)
        sidebar.classList.remove('dark-mode');
        slideButton.classList.remove('dark-mode');
        activeMenuItems.forEach(item => {
            item.classList.remove('dark-mode');
        });
    }
});


document.querySelector('.slide-button').addEventListener('click', function() {
    const sidebar = document.querySelector('.sidebar');
    const textElements = document.querySelectorAll('.profile h4, .profile p, .menu-item span, .footer-item .text-mode');
    
    // Alternar entre mostrar/ocultar los textos y ajustar el ancho del sidebar
    sidebar.classList.toggle('collapsed');
    
    // Ocultar o mostrar los elementos de texto
    textElements.forEach(element => {
        if (sidebar.classList.contains('collapsed')) {
            element.style.display = 'none'; // Oculta los textos
        } else {
            element.style.display = ''; // Muestra los textos
        }
    });
});