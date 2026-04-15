// ================== Modal ==================
function mostrarFormularioSalud() {
   document.getElementById('formularioSaludModal').style.display = 'block';
}
function cerrarFormulario() {
   document.getElementById('formularioSaludModal').style.display = 'none';
}

// ================== Búsqueda ==================
const inputBusqueda = document.getElementById('input-busqueda');
const spinner = document.getElementById('spinner');
const verMasBtn = document.getElementById('ver-mas-btn');
const contenidoAdicional = document.getElementById('contenido-adicional');
const todasCards = [...document.querySelectorAll('.info-div')];

let typingTimer;

function buscarSeguro() {
   const texto = inputBusqueda.value.toLowerCase().trim();
   let hayCoincidenciasEnOcultos = false;

   todasCards.forEach(card => {
      const h3 = card.querySelector('.info-text h3');
      if (!h3) return;

      const nombre = h3.innerText.toLowerCase();
      if (nombre.includes(texto)) {
         card.style.display = 'flex';
         if (card.closest('#contenido-adicional')) {
            hayCoincidenciasEnOcultos = true;
         }
      } else {
         card.style.display = 'none';
      }
   });

   // Mostrar bloque adicional solo si hay coincidencias allí
   if (texto && hayCoincidenciasEnOcultos) {
      contenidoAdicional.style.display = 'block';
      verMasBtn.style.display = 'none';
   } else if (!texto) {
      // Restaurar estado original si el input está vacío
      todasCards.forEach(card => {
         if (card.closest('#contenido-adicional')) {
            card.style.display = 'none';
         } else {
            card.style.display = 'flex';
         }
      });
      contenidoAdicional.style.display = 'none';
      verMasBtn.style.display = 'block';
   }
}

// ================== Input con debounce ==================
inputBusqueda.addEventListener('input', () => {
   clearTimeout(typingTimer);

   // Ocultar todas las cards mientras "carga"
   todasCards.forEach(card => card.style.display = 'none');
   spinner.style.display = 'block';

   // Ocultar botón mientras escribe
   verMasBtn.style.display = 'none';

   typingTimer = setTimeout(() => {
      buscarSeguro();
      spinner.style.display = 'none';
   }, 300);
});
// ================== Botón Ver más ==================
verMasBtn.addEventListener('click', () => {
   contenidoAdicional.style.display = 'block';
   verMasBtn.style.display = 'none';
   // Mostrar todas las cards adicionales
   const adicionales = [...contenidoAdicional.querySelectorAll('.info-div')];
   adicionales.forEach(card => card.style.display = 'flex');
});

// ================== Botón subir ==================
const btnSubir = document.getElementById("btnSubir");
window.addEventListener("scroll", () => {
   btnSubir.classList.toggle("show", window.scrollY > 200);
});
btnSubir.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));

// ================== Inicialización ==================
document.addEventListener("DOMContentLoaded", () => {
   // Mostrar solo las principales al cargar
   const principales = [...document.querySelectorAll('#cards-principales .info-div')];
   principales.forEach(card => card.style.display = 'flex');
});