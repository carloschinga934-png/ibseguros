document.addEventListener('DOMContentLoaded', () => {
   const btn_menu = document.querySelector('.btn_menu');

   if (btn_menu) {
      btn_menu.addEventListener('click', () => {
         const menu_items = document.querySelector('.menu_items');
         menu_items.classList.toggle('show');
         const body = document.body;
         body.classList.toggle('no-scroll');
      });
   }
});

document.addEventListener("DOMContentLoaded", function () {
   var modal = document.getElementById("myModal");
   var btn = document.querySelector(".boton-seguros");
   var span = document.querySelector(".close");

   btn.onclick = function (event) {
      event.preventDefault();
      modal.style.display = "block";
   };

   span.onclick = function () {
      modal.style.display = "none";
   };

   window.onclick = function (event) {
      if (event.target == modal) {
         modal.style.display = "none";
      }
   };

   var form = document.querySelector(".form-section");
   form.addEventListener("submit", function (event) {
      event.preventDefault();
      modal.style.display = "none";
   });
});
