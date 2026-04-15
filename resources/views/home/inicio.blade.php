<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
   <link rel="stylesheet" href="{{ asset('css/contacto/formulario-contacto.css') }}">
     <link rel="stylesheet" href="{{ asset('css/contacto/contacto.css') }}">
</head>

<body>
   <!-- *************  INICIO BANNER *************** -->

   <div class="hero_area">
      <!-- slider section -->
      <section class="slider_section position-relative">
         <div class="slider_bg-container"></div>
         <div class="slider-container">
            <div class="detail-box">
               <h1>RECIBE EL MEJOR<br>ASESORAMIENTO PARA<br>TU SEGURO</h1>
               <p>La elección más segura para tus seguros de vida, vehiculares y mucho más</p>
               <div>
                  <a href="contacto" class="slider-link">Contáctanos</a>
                  <a href="login" class="slider-link">Login</a>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
               </button>
            </div>
            <div class="img-box">
               <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <img src="images/seguro1.webp" alt="">
                     </div>
                     <div class="carousel-item">
                        <img src="images/seguro2.webp" alt="">
                     </div>
                     <div class="carousel-item">
                        <img src="images/seguro3.webp" alt="">
                     </div>
                     <div class="carousel-item">
                        <img src="images/seguro4.webp" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- ********************* FIN BANNER ****************-->

   <!-- *************  INICIO NOSOTROS *************** -->
   <section id="nosotros" class="py-5 bg-light">
      <div class="container">
         <h2 class="titulo-nosotros">¿CÓMO ASESORARSE?</h2>

         <!-- Primer paso -->
         <div class="card-nosotros">
            <div class="row align-items-center">
               <div class="col-md-6 text-center">
                  <img src="images/IMAGEN-1-PASO-1.webp" alt="paso-1">
               </div>
               <div class="col-md-6 d-flex align-items-center">
                  <p class="paso">Primer paso</p>
                  <div class="contenido-paso">
                     <p>{{ __('strings.home_primer_paso') }}</p>
                  </div>
               </div>
            </div>
         </div>
         <!-- Segundo paso -->
         <div class="card-nosotros">
            <div class="row align-items-center">
               <div class="col-md-6 order-md-2 text-center">
                  <img src="images/IMAGEN-2-PASO-2.webp" alt="paso-2">
               </div>
               <div class="col-md-6 order-md-1 d-flex align-items-center">
                  <p class="paso">Segundo paso</p>
                  <div class="contenido-paso">
                     <p>{{ __('strings.home_segundo_paso') }}</p>
                  </div>
               </div>
            </div>
         </div>

         <!-- Tercer paso -->
         <div class="card-nosotros">
            <div class="row align-items-center">
               <div class="col-md-6 text-center">
                  <img src="images/IMAGEN-3-PASO-3.webp" alt="paso-3">
               </div>
               <div class="col-md-6 d-flex align-items-center">
                  <p class="paso">Tercer paso</p>
                  <div class="contenido-paso">
                     <p>{{ __('strings.home_tercer_paso') }}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- *************  FIN NOSOTROS *************** -->

   <!-- ****** Servicios ******** -->

   <x-carrusel-seguro 
      :title="'Nuestros Seguros'" 
      :isFeatures="false" 
      :seguro="$seguro" 
   />

   <!-- Botón Ver más -->
   <div class="ver-mas-container" id="ver-mas-container">
      <a href="seguros">
         <button id="ver-mas-btn">Ver más</button>
      </a>
   </div>
   
   <!-- ****** Fin  Servicios ******** -->

   <!-- ****** Ini Promociones ******** -->

   <section class="py-5 bg-light">
      <div class="container">
         <div class="row justify-content-center align-items-stretch g-4">
            <div
               class="col-md-6 position-relative d-flex flex-column justify-content-center p-5 text-center text-primary"
               style="background: url('/images/ICONO_03-01.webp') center/cover no-repeat; border-radius: 12px; min-height: 400px; overflow: hidden;">

               <div style="position: absolute; inset: 0; background: #f8f9fa; opacity: 0.7; border-radius: 12px;"></div>

               <div style="position: relative; z-index: 1;">
                  <h2 class="fw-bold mb-3">¿Deseas encontrar promociones?</h2>
                  <p>{{ __('strings.home_promociones') }}</p>
                  <p class="fw-semibold">¡No dejes nada al azar! Asegura tu bienestar con nosotros</p>
               </div>
            </div>

            <!-- Formulario Promos -->
            <div class="col-lg-6 position-relative p-5 text-white d-flex flex-column justify-content-center"
               style="border-radius: 12px; min-height: 400px; overflow: hidden;">

               <div class="position-absolute top-0 start-0 w-100 h-100"
                  style="background: url('/images/emergency-room.webp') center/cover no-repeat; filter: blur(4px) brightness(0.6); z-index: 0;">
                  <div style="background: #007bff66; mix-blend-mode: multiply; width:100%; height:100%;"></div>
               </div>

               <div class="position-relative" style="z-index: 1;">
                  <h4 class="mb-4">Recibe nuestras promociones</h4>
                  <form>
                     <div class="mb-3">
                        <label for="nombre" class="form-label text-white">Nombre</label>
                        <input type="text" class="form-control" id="nombre">
                     </div>

                     <div class="mb-3">
                        <label for="apellido" class="form-label text-white">Apellido</label>
                        <input type="text" class="form-control" id="apellido">
                     </div>

                     <div class="mb-3">
                        <label for="email" class="form-label text-white">Correo</label>
                        <input type="email" class="form-control" id="email">
                     </div>

                     <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">REGISTRAR</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- ****** Fin  Promociones ******** -->

   <section class="contact-section pb-5">

      <div class="container contact-header">
         <h2 class="mt-5 mb-5 fw-bolder fs-1">Contactenos</h2>
         <iframe class="pb-4"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.391811396406!2d-76.97119068678589!3d-12.0853072552672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7a1c176f46b%3A0x48598e5782163e8!2sIBSeguros!5e0!3m2!1ses-419!2spe!4v1757215889677!5m2!1ses-419!2spe"
            width="100%" height="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
         </iframe>
      </div>

      <div class="container" style="display:flex;">
         <div class="contact-form-panel">
            <div class="form-container p-5" style="display: flex;flex-direction: column;">
   <h3 class="fw-bold">¿Deseas Contactarnos?</h3>
   <p>¡Bríndanos tus datos y nos estaremos comunicando contigo lo antes posible!</p>

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
</div>

            <!-- Imagen decorativa -->
            <div class="form-image">
               <img src="images/personaje.webp" alt="Decoración">
            </div>
         </div>
      </div>
   </section>
</body>