// Crear el div
const stick = document.createElement('div');

// Agregar clases de Bootstrap para márgenes
stick.classList.add('mx-auto', 'mt-4');

// Aplicar los estilos que no están en Bootstrap
stick.style.width = "120px";
stick.style.height = "5px";
stick.style.background = "#fff";
stick.style.borderRadius = "3px";

// Insertarlo en el DOM (por ejemplo, dentro del body)

// Crear el div
const overlay = document.createElement('div');

// Agregar clases (si estás usando Bootstrap u otras utilidades)
overlay.classList.add('overlay', 'position-absolute', 'top-0', 'start-0', 'w-100', 'h-100');

// Aplicar estilo de fondo semitransparente
overlay.style.background = "#00388199"; // azul oscuro con transparencia

// Insertarlo en el HTML, por ejemplo dentro de body o un contenedor específico
