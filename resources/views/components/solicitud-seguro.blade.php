@props(['title' => 'Contacto', 'defaultTipo' => ''])


<div id="myModal" class="modal">
   <div class="modal-content">
      <span class="close">&times;</span>
      <section id="contacto">
         <div class="verfuncion1">
            <div class="container_contacto">
               <div class="row pt-5 justify-content-center row_contacto_principal">
                  <div class="col-lg-12 texto_contenedor_contacto_ibcostructor">
                     <h1 class="mt-4 mb-4 contact_title text-center" style="color:white">{{ $title }}</h1>
                     <h4 class="mt-4 mb-4  text-center" style="color:white">
                        Déjanos tus datos para ponernos en contacto</h4>
                     <hr class="contact_hr">
                  </div>

                  <div class="col-lg-5">
                     <label for="tipopersona" class="pt-3 mb-3">Tipo de
                        Persona:</label>
                     <select class="form-control select_contact" id="tipopersona" name="tipopersona">
                        <option selected="" disabled="" value="">ELIGE
                           EL TIPO DE PERSONA</option>
                        <option value="Persona Natural">Persona Natural
                        </option>
                        <option value="Persona con Empresa">Persona con
                           Empresa</option>
                     </select>
                  </div>
               </div>

               <form action="{{ route('enviar-form-persona-contacto') }}" method="POST">
                  @csrf
                  <div class="row pt-5 justify-content-center row_contacto_principal">

                     <div class="col-lg-5 campos-persona-natural" style="display: none;">
                        <label for="nombres" class="pt-3">Nombres y
                           Apellidos:</label>
                        <div class="formulario__grupo-input">
                           <input required type="text" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]+$" class="form-control inp"
                              id="nombres" name="nombre" placeholder="Ingrese sus Nombres y Apellidos" />
                           <p id="obligatorio-message" style="color: red; display: none;">
                              *Este campo es obligatorio</p>
                           <p id="incorrecto-message" style="color: red; display: none;">
                              *Este campo solo debe contener
                              letras</p>
                        </div>
                     </div>


                     <div class="col-lg-5 campos-persona-natural">
                        <label for="telefono" class="pt-3">Teléfono
                           Fijo:</label>
                        <div class="input-group flex-nowrap">
                           <span class="input-group-text" id="spTelefono">01</span>
                           <input class="form-control inp" id="telefono" name="telefono" pattern="[2-7][0-9]{6}"
                              oninvalid="setCustomValidity('Ingrese un número valido para Lima-Perú')"
                              oninput="setCustomValidity('')" maxlength="7" minlength="7"
                              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                              placeholder="Tel.(Opcional)" aria-describedby="basic-addon1" autocomplete="off">
                        </div>
                        <p id="obligatorio-mesage-tel" style="color: red; display: none;">*Este
                           campo es obligatorio</p>
                        <p id="incorrecto-message-tel" style="color: red; display: none;">
                           *Ingrese solo números en este campo</p>
                     </div>

                     <div class="col-lg-5 campos-persona-natural">
                        <label for="email" class="pt-3">Email</label>
                        <input required type="email" class="form-control inp" id="email" name="email"
                           placeholder="nombre@ejemplo.com" />
                        <p id="email-validation-message" class="validation-message"></p>
                     </div>
                     <div class="col-lg-5 campos-persona-natural">
                        <label for="celular" class="pt-3">Celular:</label>
                        <div class="input-group flex-nowrap">
                           <span class="input-group-text" id="spCelular">+51</span>
                           <input required type="text" class="form-control inp" id="celular" name="celular"
                              pattern="[9][0-9]{8}"
                              oninvalid="setCustomValidity('Ingrese un numero valido, debe ser de nueve digitos y valido para Lima-Perú')"
                              oninput="setCustomValidity('')" maxlength="9" minlength="9"
                              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="Celular">
                        </div>
                        <p id="obligatorio-message-cel" style="color: red; display: none;">*Este
                           campo es obligatorio</p>
                        <p id="incorrecto-message-cel" style="color: red; display: none;">
                           *Ingrese solo números en este campo</p>
                     </div>

                     <div class="col-lg-5 campos-persona-natural">
                        <label for="dni" class="pt-3">DNI:</label>
                        <div class="input-group flex-nowrap">

                           <input required type="text" class="form-control inp" id="dni" name="dni" pattern="[0-9]{8}"
                              oninvalid="setCustomValidity('Ingrese un numero valido, debe ser de nueve digitos y valido para Lima-Perú')"
                              oninput="setCustomValidity('')" maxlength="8" minlength="8"
                              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="dni">
                        </div>
                        <p id="obligatorio-mesage-tel" style="color: red; display: none;">*Este
                           campo es obligatorio</p>
                        <p id="incorrecto-message-tel" style="color: red; display: none;">
                           *Ingrese solo números en este campo</p>
                     </div>


                     <div class="col-lg-5 campos-persona-natural">
                        <label for="tipoSeguro" class="pt-3">Seguro que desea cotizar:</label>
                        <select required class="form-control" id="tipoSeguro" name="tipoSeguro">
                           <option disabled selected value="" {{ empty($defaultTipo) ? 'selected' : '' }}>Elige
                              el seguro :</option>
                           <option value="Cascos Marítimos" {{ $defaultTipo == 'Cascos Marítimos' ? 'selected' : '' }}>
                              Cascos Marítimos</option>
                           <option value="Caución/Crédito" {{ $defaultTipo == 'Caución/Crédito' ? 'selected' : '' }}>
                              Caución/Crédito</option>
                           <option value="Contratistas de Todo Riesgo - CAR" {{ $defaultTipo == 'CAR' ? 'selected' : '' }}>Contratistas de Todo Riesgo - CAR
                           </option>
                           <option value="Seguro de Salud" {{ $defaultTipo == 'Seguro de Salud' ? 'selected' : '' }}>
                              Seguro de Salud</option>
                           <option value="Seguros Vehicular" {{ $defaultTipo == 'Seguro Vehicular' ? 'selected' : '' }}>
                              Seguros Vehicular</option>
                           <option value="Seguros de Vida a Corto Plazo" {{ $defaultTipo == 'Seguros de Vida a Corto Plazo' ? 'selected' : '' }}>Seguros de Vida a Corto Plazo</option>
                           <option value="Seguros de Vida a Largo Plazo" {{ $defaultTipo == 'Seguros de Vida a Largo Plazo' ? 'selected' : '' }}>Seguros de Vida a Largo Plazo</option>
                           <option value="Seguros de Hogar" {{ $defaultTipo == 'Seguros de Hogar' ? 'selected' : '' }}>
                              Seguros de Hogar</option>
                           <option value="Seguros de Viajes" {{ $defaultTipo == 'Seguros de Viajes' ? 'selected' : '' }}>
                              Seguros de Viajes</option>
                           <option value="Vida Ley" {{ $defaultTipo == 'Vida Ley' ? 'selected' : '' }}>Vida Ley
                           </option>
                        </select>
                     </div>

                     <div class="col-lg-12  mx-auto campos-persona-natural" style="width: 85%;">
                        <label class="pt-3">Mensaje:</label>
                        <textarea required class="form-control" rows="5" id="mensajePersona" name="mensaje"
                           placeholder="Ingrese su mensaje aquí..."></textarea>
                        <br>
                     </div>

                     <div class="col-lg-12 text-center mb-4 mt-3 campos-persona-natural">
                        <span class="help-block">
                           <input required class="btn btn-warning btn-lg marginlastmin justify-content-center"
                              type="submit" name="submit" value="Enviar" />
                           <span class="spinner-border text-success spinner-border-sm" id="spinnerPersona" role="status"
                              aria-hidden="true" style="width: 1.4rem;height: 1.4rem;margin-right: 8px;display: none;">
                           </span>
                        </span>
                     </div>

                     <p class="pt-3 campos-persona-natural" style="margin-left: 8%;">Al Hacer clic en
                        enviar, Usted manifiesta su consentimiento para
                        que IBCORP realice el tratamiento de sus datos
                        personales, <br> conforme a las <a href=" pdf/Terminos_y_condiciones.pdf" target="blank">
                           Condiciones y
                           T&eacute;rminos detallados en la sección
                           Pol&iacute;tica de Tratamiento de Datos
                           Personales.</a></p>
                  </div>
               </form>

               <form id="form-empresa" class="campos-persona-empresa"
                  action="{{ route('enviar-form-empresa-consulta') }}" method="POST">
                  @csrf
                  <div class="row pt-5 justify-content-center row_contacto_principal">
                     <!-- Nombre de la empresa -->
                     <div class="col-lg-6">
                        <label for="empresa" class="pt-3">Nombre de la empresa:</label>
                        <input required type="text" class="form-control inp" id="empresa" name="nombreempresa"
                           placeholder="Ingrese el nombre de su empresa">
                     </div>

                     <!-- Rubro -->
                     <div class="col-lg-6">
                        <label for="rubro" class="pt-3">Rubro de la empresa:</label>
                        <select required class="form-control" id="rubro" name="rubroempresa">
                           <option value="" disabled selected>Seleccione un rubro</option>
                           <option value="Construcción">Construcción</option>
                           <option value="Comercio">Comercio</option>
                           <option value="Educación">Educación</option>
                           <option value="Tecnología">Tecnología</option>
                           <option value="Salud">Salud</option>
                           <option value="Transporte">Transporte</option>
                           <option value="Otros">Otros</option>
                        </select>
                     </div>

                     <!-- RUC -->
                     <div class="col-lg-6">
                        <label for="ruc" class="pt-3">Número de RUC:</label>
                        <input required type="text" class="form-control inp" id="ruc" name="RUCempresa"
                           placeholder="Ingrese el número RUC de su empresa">
                     </div>

                     <!-- Cargo -->
                     <div class="col-lg-6">
                        <label for="cargo" class="pt-3">Cargo:</label>
                        <input required type="text" class="form-control inp" id="cargo" name="cargoempresa"
                           placeholder="Ingrese su cargo">
                     </div>

                     <!-- Teléfono -->
                     <div class="col-lg-6">
                        <label for="telefono" class="pt-3">Teléfono:</label>
                        <input required type="text" class="form-control inp" id="telefono" name="telefonoempresa"
                           placeholder="Teléfono de contacto">
                     </div>

                     <!-- Celular -->
                     <div class="col-lg-6">
                        <label for="celular" class="pt-3">Celular:</label>
                        <input required type="text" class="form-control inp" id="celular" name="celularempresa"
                           placeholder="Celular de contacto">
                     </div>

                     <!-- Email -->
                     <div class="col-lg-6">
                        <label for="emailEmpresa" class="pt-3">Correo electrónico:</label>
                        <input required type="email" class="form-control inp" id="emailEmpresa" name="emailempresa"
                           placeholder="enterprise@org.pe">
                     </div>

                     <!-- Tipo de seguro -->
                     <div class="col-lg-6">
                        <label for="tipoSeguroEmpresa" class="pt-3">Seguro que desea cotizar:</label>
                        <select required class="form-control" id="tipoSeguro" name="tipoSeguro">
                           <option disabled selected value="" {{ empty($defaultTipo) ? 'selected' : '' }}>Elige
                              el seguro :</option>
                           <option value="Cascos Marítimos" {{ $defaultTipo == 'Cascos Marítimos' ? 'selected' : '' }}>
                              Cascos Marítimos</option>
                           <option value="Caución/Crédito" {{ $defaultTipo == 'Caución/Crédito' ? 'selected' : '' }}>
                              Caución/Crédito</option>
                           <option value="Contratistas de Todo Riesgo - CAR" {{ $defaultTipo == 'CAR' ? 'selected' : '' }}>Contratistas de Todo Riesgo - CAR
                           </option>
                           <option value="Entidades Prestadoras de Salud - EPS" {{ $defaultTipo == 'EPS' ? 'selected' : '' }}>Entidades Prestadoras de Salud
                              - EPS</option>
                           <option value="Equipo de Aseguramiento de Riesgos- EAR" {{ $defaultTipo == 'EAR' ? 'selected' : '' }}>Equipo de Aseguramiento de
                              Riesgos- EAR</option>
                           <option value="Equipo Electrónico" {{ $defaultTipo == 'Equipo Electrónico' ? 'selected' : '' }}>Equipo Electrónico</option>
                           <option value="Lucro Cesante" {{ $defaultTipo == 'Lucro Cesante' ? 'selected' : '' }}>
                              Lucro Cesante</option>
                           <option value="Multirriesgo" {{ $defaultTipo == 'Multirriesgo' ? 'selected' : '' }}>
                              Multirriesgo</option>
                           <option value="Responsabilidad Civil" {{ $defaultTipo == 'Responsabilidad Civil' ? 'selected' : '' }}>Responsabilidad Civil</option>
                           <option value="Robo y Asalto" {{ $defaultTipo == 'Robo y Asalto' ? 'selected' : '' }}>
                              Robo y Asalto</option>
                           <option value="Seguro 3D" {{ $defaultTipo == 'Seguro 3D' ? 'selected' : '' }}>Seguro
                              3D</option>
                           <option value="Seguro Complementario de Trabajo de Riesgo - SCTR" {{ $defaultTipo == 'SCTR' ? 'selected' : '' }}>Seguro Complementario de Trabajo de
                              Riesgo - SCTR</option>
                           <option value="Seguro de Salud" {{ $defaultTipo == 'Seguro de Salud' ? 'selected' : '' }}>
                              Seguro de Salud</option>
                           <option value="Seguro de Transporte" {{ $defaultTipo == 'Seguro de Transporte' ? 'selected' : '' }}>Seguro de Transporte</option>
                           <option value="Seguro Obligatorio de Accidentes de Tránsito - SOAT" {{ $defaultTipo == 'SOAT' ? 'selected' : '' }}>Seguro Obligatorio de Accidentes de
                              Tránsito - SOAT</option>
                           <option value="Seguros Académicos" {{ $defaultTipo == 'Seguros Académicos' ? 'selected' : '' }}>Seguros Académicos</option>
                           <option value="Seguros Contra Accidentes" {{ $defaultTipo == 'Seguros Contra Accidentes' ? 'selected' : '' }}>Seguros Contra Accidentes</option>
                           <option value="Seguros Contra Incendios" {{ $defaultTipo == 'Seguros Contra Incendios' ? 'selected' : '' }}>Seguros Contra Incendios</option>
                           <option value="Seguros Contra Rotura de Maquinaria" {{ $defaultTipo == 'Seguros Contra Rotura de Maquinaria' ? 'selected' : '' }}>Seguros Contra Rotura de Maquinaria
                           </option>
                           <option value="Seguros Oncológico" {{ $defaultTipo == 'Seguros Oncológico' ? 'selected' : '' }}>Seguros Oncológico</option>
                           <option value="Seguros Vehicular" {{ $defaultTipo == 'Seguros Vehicular' ? 'selected' : '' }}>
                              Seguros Vehicular</option>
                           <option value="Seguros de Ahorro" {{ $defaultTipo == 'Seguros de Ahorro' ? 'selected' : '' }}>
                              Seguros de Ahorro</option>
                           <option value="Seguros de Hogar" {{ $defaultTipo == 'Seguros de Hogar' ? 'selected' : '' }}>
                              Seguros de Hogar</option>
                           <option value="Seguros de Vida a Corto Plazo" {{ $defaultTipo == 'Seguros de Vida a Corto Plazo' ? 'selected' : '' }}>Seguros de Vida a Corto Plazo</option>
                           <option value="Seguros de Vida a Largo Plazo" {{ $defaultTipo == 'Seguros de Vida a Largo Plazo' ? 'selected' : '' }}>Seguros de Vida a Largo Plazo</option>
                           <option value="Seguros de Viajes" {{ $defaultTipo == 'Seguros de Viajes' ? 'selected' : '' }}>
                              Seguros de Viajes</option>
                           <option value="Todo Riesgo Equipo de Contratista - TREC" {{ $defaultTipo == 'TREC' ? 'selected' : '' }}>Todo Riesgo Equipo de
                              Contratista - TREC</option>
                           <option value="Vida Ley" {{ $defaultTipo == 'Vida Ley' ? 'selected' : '' }}>Vida Ley
                           </option>
                        </select>
                     </div>

                     <!-- Mensaje -->
                     <div class="col-lg-12">
                        <label for="mensajePersona" class="pt-3">Mensaje:</label>
                        <textarea required class="form-control" rows="3" id="mensajePersona" name="mensajeempresa"
                           placeholder="Ingrese su mensaje aquí..."></textarea>
                     </div>

                     <!-- Botón enviar -->
                     <div class="col-lg-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                     </div>
                  </div>

               </form>

            </div>
         </div>
      </section>
   </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", () => {
      const tipoPersona = document.getElementById("tipopersona");
      const natural = document.querySelector(".campos-persona-natural");
      const empresa = document.querySelector(".campos-persona-empresa");

      const naturalSelect = natural.querySelector("select");
      const empresaSelect = empresa.querySelector("select");

      // initial state
      natural.style.display = "none";
      empresa.style.display = "block";

      tipoPersona.addEventListener("change", () => {
         if (tipoPersona.value === "Persona Natural") {
            natural.style.display = "block";
            empresa.style.display = "none";

            // force placeholder
            naturalSelect.value = "";
            naturalSelect.querySelector('option[value=""]').selected = true;

         } else if (tipoPersona.value === "Persona con Empresa") {
            natural.style.display = "none";
            empresa.style.display = "block";

            // force placeholder
            empresaSelect.value = "";
            empresaSelect.querySelector('option[value=""]').selected = true;
         }
      });
   });
</script>