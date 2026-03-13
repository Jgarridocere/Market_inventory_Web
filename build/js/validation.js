document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-producto');
    
   
    if (formulario) {
        formulario.addEventListener('submit', function(evento) {
            const precio = document.getElementById('precio').value;
            
            
            const regexPrecio = /^[0-9]+(\.[0-9]{1,2})?$/;

            
            if (!regexPrecio.test(precio)) {
                evento.preventDefault(); 
                alert('El precio no es válido. Ingresa solo números y un punto decimal (Ej: 15.50).');
            }
        });
    }
});