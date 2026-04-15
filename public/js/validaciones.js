document.getElementById("nombres").addEventListener("input", function (event) {  /// validaciones para NOMBRES Y APELLIDOS
   var inputValue = this.value;

   inputValue = inputValue.trim();

   if (/[\d!@#$%^&*()_+={}\[\]:;<>,.?~ç´´``¡'º\\/-]+/.test(inputValue)) {
      document.getElementById("incorrecto-message").style.display = "block";

      this.value = inputValue.slice(0, -1);
   } else if (inputValue === "") {
      document.getElementById("obligatorio-message").style.display = "block";
      document.getElementById("incorrecto-message").style.display = "none";
   } else {
      document.getElementById("obligatorio-message").style.display = "none";
      document.getElementById("incorrecto-message").style.display = "none";
   }
});


document.getElementById("nombres").addEventListener("focus", function () {
   document.getElementById("obligatorio-message").style.display = "none";
   document.getElementById("incorrecto-message").style.display = "none";
});

//*////////////////////////////////////////////////////////////////

document.getElementById("empresa").addEventListener("input", function (event) {  /// validaciones para  nombre de empresa
   var inputValue = this.value;

   inputValue = inputValue.trim();

   if (/[\d!@#$%^&*()_+={}\[\]:;<>,.?~ç´´``¡'º\\/-]+/.test(inputValue)) {
      document.getElementById("incorrecto-messag").style.display = "block";

      this.value = inputValue.slice(0, -1);
   } else if (inputValue === "") {
      document.getElementById("obligatorio-messag").style.display = "block";
      document.getElementById("incorrecto-messag").style.display = "none";
   } else {
      document.getElementById("obligatorio-messag").style.display = "none";
      document.getElementById("incorrecto-messag").style.display = "none";
   }
});

document.getElementById("empresa").addEventListener("focus", function () {
   document.getElementById("obligatorio-messag").style.display = "none";
   document.getElementById("incorrecto-messag").style.display = "none";
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7/

document.getElementById("telefono").addEventListener("input", function () {    /// es para validar el telefono 
   var inputValue = new RegExp("(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}");

   if (/[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+/.test(inputValue)) {
      document.getElementById("incorrecto-message-tel").style.display = "block";
   } else if (numericValue.trim() === "") {
      document.getElementById("obligatorio-mesage-tel").style.display = "block";
      document.getElementById("incorrecto-message-tel").style.display = "none";
   } else {
      document.getElementById("obligatorio-mesage-tel").style.display = "none";
      document.getElementById("incorrecto-message-tel").style.display = "none";
   }
});

window.onload = function () {
   document.getElementById("enviar").onclick = function () {
      console.clear();
      /* var telef = new RegExp('^(\+34|0034|34)?[6789]\d{8}$');*/
      /* El error:                 ^                   ^        */
      var telef = new RegExp("^(\\+34|0034|34)?[6789]\\d{8}$");
      var valortelef = document.getElementById("c7").value;
      if (telef.test(valortelef)) {
         console.log("valor correcto");
      } else {
         console.log("INTRODUCE OTRO VALOR. EJ: +34666555444");
      }

      var nombre = new RegExp("(([A-Z][a-z]*)(\\s*)([A-Z][a-z]*)(\\s*)([A-Z][a-z]*)){1,30}");
      valornombre = document.getElementById("c1").value;
      if (nombre.test(valornombre)) {
         console.log("valor correcto");
      } else {
         console.log("INTRODUCE OTRO VALOR. EJ: John Doe Due");
      }
   };
};

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7/

document.getElementById("celular").addEventListener("input", function () {    //// VALIDACIONES PARA CELULAR 
   var inputValue = this.value;

   var numericValue = inputValue.replace(/[^0-9]/g, '');

   var maxLength = 12;
   numericValue = numericValue.slice(0, maxLength);

   this.value = numericValue;

   if (/[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+/.test(inputValue)) {
      document.getElementById("incorrecto-message-cel").style.display = "block";
   } else if (numericValue.trim() === "") {
      document.getElementById("obligatorio-mesage-cel").style.display = "block";
      document.getElementById("incorrecto-message-cel").style.display = "none";
   } else {
      document.getElementById("obligatorio-mesage-cel").style.display = "none";
      document.getElementById("incorrecto-message-cel").style.display = "none";
   }
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7/
document.addEventListener("DOMContentLoaded", function () {     /// VALIDACIONES PARA EMAIL 
   const emailInput = document.getElementById("email");
   const emailValidationMessage = document.getElementById("email-validation-message");
   const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   emailInput.addEventListener("keyup", function () {
      const email = emailInput.value.trim();
      if (email === "") {
         emailValidationMessage.textContent = "*Este campo es obligatorio";
         emailValidationMessage.style.color = "red";
      } else if (email.match(emailPattern)) {
         emailValidationMessage.textContent = "Email válido";
         emailValidationMessage.style.color = "green";
      } else {
         emailValidationMessage.textContent = "Email incorrecto";
         emailValidationMessage.style.color = "red";
      }
   });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7/
document.getElementById("ruc").addEventListener("input", function () {  ///VALIDACIONES PARA RUC 
   var inputValue = this.value;
   var numericValue = inputValue.replace(/[^0-9]/g, '');
   var maxLength = 11;
   numericValue = numericValue.slice(0, maxLength);
   this.value = numericValue;
   if (/[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+/.test(inputValue)) {
      document.getElementById("incorrecto-message-ruc").style.display = "block";
   } else if (numericValue.trim() === "") {
      document.getElementById("obligatorio-mesage-ruc").style.display = "block";
      document.getElementById("incorrecto-message-ruc").style.display = "none";
   } else {
      document.getElementById("obligatorio-mesage-ruc").style.display = "none";
      document.getElementById("incorrecto-message-ruc").style.display = "none";
   }
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7/

document.getElementById("cargo").addEventListener("input", function (event) {   /// VALÑIDACIONES PARA CARGO
   var inputValue = this.value;

   inputValue = inputValue.trim();

   if (/[\d!@#$%^&*()_+={}\[\]:;<>,.?~ç´´``¡'º\\/-]+/.test(inputValue)) {
      document.getElementById("incorrecto-message-cargo").style.display = "block";

      this.value = inputValue.slice(0, -1);
   } else if (inputValue === "") {
      document.getElementById("obligatorio-message-cargo").style.display = "block";
      document.getElementById("incorrecto-message-cargo").style.display = "none";
   } else {
      document.getElementById("obligatorio-message-cargo").style.display = "none";
      document.getElementById("incorrecto-message-cargo").style.display = "none";
   }
});

document.getElementById("cargo").addEventListener("focus", function () {
   document.getElementById("obligatorio-message-cargo").style.display = "none";
   document.getElementById("incorrecto-message-cargo").style.display = "none";
});
