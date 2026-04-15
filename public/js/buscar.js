document.addEventListener("keyup", e => {
  if (e.target.matches("#buscador")) {
    const términoDeBúsqueda = e.target.value.toLowerCase();

    document.querySelectorAll(".card").forEach(card => {
      const nombreSeguro = card.querySelector("h3").textContent.toLowerCase();

      if (nombreSeguro.includes(términoDeBúsqueda)) {
        card.style.display = "block";  // Muestra la tarjeta si hay coincidencia
      } else {
        card.style.display = "none";   // Oculta la tarjeta si no hay coincidencia
      }
    });
  }
});
