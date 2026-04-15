<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/contacto/contacto.css') }}">
</head>

<body>
   <!-- Banner de contacto -->
   <div class="banner">
      <img src="images/apartado-contacto.webp" alt="Contacto">
      <div class="overlay"></div>
      <div class="banner-text">
         <h1 class="titulo">CONTACTO</h1>
         <p>{{ __('strings.intro_contacto') }}</p>
      </div>
   </div>

   <!-- Sección de formulario de contacto -->
   <section class="contacto-section">
      <div class="container">
         <div class="form-container">
            <div class="form-main">
               <h2 class="form-title">ENVÍANOS UN MENSAJE</h2>
               <form id="formularioContacto" class="contact-form">
                  @csrf
                  <div class="form-row">
                     <div class="form-group">
                        <div class="input-with-icon">
                           <i class="bi bi-person"></i>
                           <input required type="text" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]+$" class="form-control"
                              id="nombres" name="nombre" placeholder="Nombres y Apellidos">
                        </div>
                        <p class="error-message" id="obligatorio-message">*Este campo es obligatorio</p>
                        <p class="error-message" id="incorrecto-message">*Este campo solo debe contener letras</p>
                     </div>

                     <div class="form-group">
                        <div class="input-with-icon">
                           <i class="bi bi-phone"></i>
                           <input required type="text" class="form-control" id="celular" name="celular"
                              pattern="[9][0-9]{8}"
                              oninvalid="setCustomValidity('Ingrese un numero valido, debe ser de nueve digitos y valido para Lima-Perú')"
                              oninput="setCustomValidity('')" maxlength="9" minlength="9"
                              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="Celular">
                        </div>
                        <p class="error-message" id="obligatorio-message-cel">*Este campo es obligatorio</p>
                        <p class="error-message" id="incorrecto-message-cel">*Ingrese solo números en este campo</p>
                     </div>
                  </div>

                  <div class="form-row">
                     <div class="form-group">
                        <div class="input-with-icon">
                           <i class="bi bi-envelope"></i>
                           <input required type="email" class="form-control" id="email" name="email"
                              placeholder="Email">
                        </div>
                        <p class="validation-message" id="email-validation-message"></p>
                     </div>

                     <div class="form-group">
                        <div class="input-with-icon">
                           <i class="fa-solid fa-tty"></i>
                           <input required type="text" class="form-control" id="telefono" name="telefono"
                              pattern="[2-7][0-9]{6}"
                              oninvalid="setCustomValidity('Ingrese un número valido para Lima-Perú')"
                              oninput="setCustomValidity('')" maxlength="7" minlength="7"
                              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                              placeholder="Número telefónico" autocomplete="off">
                        </div>
                        <p class="error-message" id="obligatorio-mesage-tel">*Este campo es obligatorio</p>
                        <p class="error-message" id="incorrecto-message-tel">*Ingrese solo números en este campo</p>
                     </div>
                  </div>

                  <div class="form-row">
                     <div class="form-group">
                        <div class="input-with-icon">
                           <i class="bi bi-card-text"></i>
                           <input required type="text" class="form-control" id="dni" name="dni" pattern="[0-9]{8}"
                              oninvalid="setCustomValidity('Ingrese un numero valido, debe ser de ocho digitos')"
                              oninput="setCustomValidity('')" maxlength="8" minlength="8"
                              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="DNI">
                        </div>
                        <p class="error-message" id="obligatorio-mesage-dni">*Este campo es obligatorio</p>
                        <p class="error-message" id="incorrecto-message-dni">*Ingrese solo números en este campo</p>
                     </div>

                     <div class="form-group">
                        <div class="input-with-icon">
                           <i class="bi bi-shield-check"></i>
                           <select required class="form-control" id="tipoSeguro" name="tipoSeguro" style="padding: 7px 10px 10px 40px;">
                              @foreach ($optionsItems as $item)
                                 <option>{{ $item }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>

                  <div class="form-row full-width">
                     <div class="form-group">
                        <div class="input-with-icon textarea-container">
                           <i class="bi bi-chat-dots"></i>
                           <textarea required class="form-control" rows="4" id="mensajePersona" name="mensaje"
                              placeholder="Escribe tu mensaje aquí (Mínimo 10 caracteres)"></textarea>
                        </div>
                     </div>
                  </div>

                  <div class="form-row submit-row">
                     <button type="submit" class="submit-btn" name="submit">
                        <span>Enviar mensaje</span>
                        <i class="bi bi-arrow-right"></i>
                        <span class="spinner-border spinner-border-sm" id="spinnerPersona" role="status"
                           aria-hidden="true"></span>
                     </button>
                  </div>
               </form>
                 <div id="respuestaFormContacto"></div>
            </div>
             <script>
                    // Aquí puedes agregar el código JavaScript para manejar el envío del formulario
                    document.getElementById('formularioContacto').addEventListener('submit', async function (e) {
                        e.preventDefault(); // Evita el envío tradicional del formulario

                        // Muestra el spinner de carga
                        document.getElementById('spinnerPersona').style.display = 'inline-block';

                        // Recopila los datos del formulario
                        const formData = new FormData(this);
                  
                        // Envía los datos al servidor usando Fetch API
                        let response = await fetch('{{ route('enviar-form-persona-contacto') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        });

                        let data = await response.json();
                        console.log(data);
                        document.getElementById('spinnerPersona').style.display = 'none';

                        if (data.status === 'success') {
                            // Limpia el formulario si el envío fue exitoso
                            document.getElementById('formularioContacto').reset();
                            document.getElementById('respuestaFormContacto').innerText = "Consulta enviada correctamente. Nos pondremos en contacto contigo pronto.";
                        } else {
                            // Muestra un mensaje de error si hubo un problema
                           
                              let mensajes = [];
                              for (let campo in data.errors) {
                                    mensajes.push(data.errors[campo][0]);
                              }
                              document.getElementById('respuestaFormContacto').innerText = mensajes.join("\n");
                        }
                     
                    });
                </script>
            <div class="contact-info">
               <h2 class="info-title">Información de Contacto</h2>
               <div class="info-item">
                  <i class="bi bi-phone"></i>
                  <div class="info-content">
                     <h3>Teléfono</h3>
                     <p>+51 912 027 724</p>
                  </div>
               </div>

               <div class="info-item">
                  <i class="bi bi-envelope"></i>
                  <div class="info-content">
                     <h3>Email</h3>
                     <a href="mailto:contacto@ibseguros.com">contacto@ibseguros.com</a>
                  </div>
               </div>

               <div class="info-item">
                  <i class="bi bi-clock"></i>
                  <div class="info-content">
                     <h3>Horario de atención</h3>
                     <p>Lunes a Viernes: 09:00 am - 18:00 pm</p>
                  </div>
               </div>

               <div class="ambulancia-container">
                  <img src="images/personaje.webp" alt="ambulancia" class="ambulancia-img">
               </div>
            </div>
         </div>
      </div>
   </section>
</body>