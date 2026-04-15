<!-- Extraer el contenido del formulario de seguros-salud.php (líneas 147-499) -->
<!DOCTYPE html>
<html lang="es">

<head>
   <style>
      .fuente-roboto {
         font-family: 'Roboto', sans-serif;
      }

      .fuente-poppins {
         font-family: 'Poppins', sans-serif;
      }

      .bg-celeste {
         background-color: rgb(108, 189, 221);
         color: white;
      }

      .fondo-cristal {
         background-color: rgba(255, 255, 255, 0.2);
         backdrop-filter: blur(10px);
         -webkit-backdrop-filter: blur(10px);
         border-radius: 15px;
         padding: 20px;
         box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      }
   </style>

   <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
   <form class="ajaxpersona container p-4 rounded fondo-cristal " action="controller/enviar-correo-contact.php"
      method="post">
      <div class="container-fluid layout_padding-top layout_padding2-bottom">
         <div class="layout_padding-top layout_padding2-bottom container py-4 ">
            <div class="row justify-content-center">
               <div class="col-lg-5 fuente-poppins">
                  <label for="tipopersona" class="pt-3 mb-3">Tipo de Persona:</label>
                  <select class="form-control select_contact" id="tipopersona" name="tipopersona">
                     <option selected disabled value="">ELIGE UNA OPCION</option>
                     <option value="Persona Natural">Persona Natural</option>
                     <option value="Persona con Empresa">Persona con Empresa</option>
                  </select>
               </div>
            </div>
         </div class="container py-4">

         <form class="ajaxpersona " action=" controller/enviar-correo-contact.php" method="POST">
            @csrf

            <div class="container py-4">

               <div class="row gy-4 justify-content-center row_contacto_principal">

                  <div class="col-md-6 campos-persona-natural fuente-poppins">
                     <label for="nombres" class="form-label">Nombres y
                        Apellidos:</label>
                     <div class="formulario__grupo-input">
                        <input required type="text" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]+$" class="form-control inp"
                           id="nombres" name="nombres" placeholder="Ingrese sus Nombres y Apellidos" />
                        <p id="obligatorio-message" style="color: red; display: none;">
                           *Este campo es obligatorio</p>
                        <p id="incorrecto-message" style="color: red; display: none;">
                           *Este campo solo debe contener
                           letras</p>
                        <br>
                     </div>
                  </div>

                  <div class="col-md-6 campos-persona-natural fuente-poppins">
                     <label for="telefono" class="form-label">Teléfono
                        Fijo:</label>
                     <div class="input-group flex-nowrap">
                        <span class="input-group-text bg-celeste text-white" id="spTelefono">01</span>
                        <input class="form-control inp" id="telefono" name="telefono" pattern="[2-7][0-9]{6}"
                           oninvalid="setCustomValidity('Ingrese un número valido para Lima-Perú')"
                           oninput="setCustomValidity('')" maxlength="7" minlength="7"
                           onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                           placeholder="Tel.(Opcional)" aria-describedby="basic-addon1" autocomplete="off">
                        <br>
                     </div>
                     <p id="obligatorio-mesage-tel" style="color: red; display: none;">*Este
                        campo es obligatorio</p>
                     <p id="incorrecto-message-tel" style="color: red; display: none;">
                        *Ingrese solo números en este campo</p>
                  </div>

                  <div class="col-md-6 campos-persona-natural fuente-poppins">
                     <label for="email" class="form-label">Email</label>
                     <input required type="email" class="form-control " id="email" name="email"
                        placeholder="nombre@ejemplo.com" />
                     <p id="email-validation-message" class="validation-message"></p>
                  </div>
                  <div class="col-md-6 campos-persona-natural fuente-poppins">
                     <label for="celular" class="form-label">Celular:</label>
                     <div class="input-group flex-nowrap">
                        <span class="input-group-text bg-celeste text-white" id="spCelular">+51</span>
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

                  <div class="col-md-6 campos-persona-natural fuente-poppins">
                     <label for="tipoSeguro" class="form-label">Seguro que
                        desea cotizar:</label>
                     <select required class="form-control select2 " id="tipoSeguro" name="tipoSeguro">
                        <option selected disabled value="">Elige el seguro :</option>
                        <option value="Cascos Marítimos">Cascos Marítimos</option>
                        <option value="Caución/Crédito">Caución/Crédito</option>
                        <option value="Contratistas de Todo Riesgo - CAR">Contratistas de Todo Riesgo - CAR</option>
                        <option value="Entidades Prestadoras de Salud - EPS">Entidades Prestadoras de Salud - EPS
                        </option>
                        <option value="Equipo de Aseguramiento de Riesgos- EAR">Equipo de Aseguramiento de Riesgos- EAR
                        </option>
                        <option value="Equipo Electrónico">Equipo Electrónico</option>
                        <option value="Lucro Cesante">Lucro Cesante</option>
                        <option value="Multirriesgo">Multirriesgo</option>
                        <option value="Responsabilidad Civil">Responsabilidad Civil</option>
                        <option value="Robo y Asalto">Robo y Asalto</option>
                        <option value="Seguro 3D">Seguro 3D</option>
                        <option value="Seguro Complementario de Trabajo de Riesgo - SCTR">Seguro Complementario de
                           Trabajo de Riesgo - SCTR</option>
                        <option value="Seguro de Salud">Seguros de Salud</option>
                        <option value="Seguro de Transporte">Seguro de Transporte</option>
                        <option value="Seguro Obligatorio de Accidentes de Tránsito - SOAT">Seguro Obligatorio de
                           Accidentes de Tránsito - SOAT</option>
                        <option value="Seguros Académicos">Seguros Académicos</option>
                        <option value="Seguros Contra Accidentes">Seguros Contra Accidentes</option>
                        <option value="Seguros Contra Incendios">Seguros Contra Incendios</option>
                        <option value="Seguros Contra Rotura de Maquinaria">Seguros Contra Rotura de Maquinaria</option>

                        <option value="Seguros Oncológico">Seguros Oncológico</option>
                        <option value="Seguros Vehicular">Seguros Vehicular</option>
                        <option value="Seguros de Ahorro">Seguros de Ahorro</option>
                        <option value="Seguros de Hogar">Seguros de Hogar</option>
                        <option value="Seguros de Vida a Corto Plazo">Seguros de Vida a Corto Plazo</option>
                        <option value="Seguros de Vida a Largo Plazo">Seguros de Vida a Largo Plazo</option>
                        <option value="Seguros de Viajes">Seguros de Viajes</option>
                        <option value="Todo Riesgo Equipo de Contratista - TREC">Todo Riesgo Equipo de Contratista -
                           TREC</option>
                        <option value="Vida Ley">Vida Ley</option>

                     </select>
                     <br>
                  </div>

                  <div class="col-md-6 campos-persona-natural fuente-poppins">
                     <label for="dni" class="form-label">DNI:</label>
                     <div class="input-group flex-nowrap">

                        <input required type="text" class="form-control inp" id="dni" name="dni" pattern="[0-9]{8}"
                           oninvalid="setCustomValidity('Ingrese un numero valido, debe ser de nueve digitos y valido para Lima-Perú')"
                           oninput="setCustomValidity('')" maxlength="8" minlength="8"
                           onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="DNI">
                     </div>
                     <p id="obligatorio-mesage-tel" style="color: red; display: none;">*Este
                        campo es obligatorio</p>
                     <p id="incorrecto-message-tel" style="color: red; display: none;">
                        *Ingrese solo números en este campo</p>
                  </div>

                  <div class="col-lg-12 mx-auto d-flex justify-content-center fuente-poppins">
                     <div class="campos-persona-natural" style="width: 85%;">
                        <label class="form-label">Mensaje:</label>
                        <textarea required class="form-control" rows="5" id="mensajePersona" name="mensajePersona"
                           placeholder="Ingrese su mensaje aquí..."></textarea>
                        <br>
                     </div>
                  </div>

                  <div class="col-12 text-center mb-4 mt-3 campos-persona-natural fuente-poppins">
                     <span class="help-block">
                        <input required class="btn btn-outline-info justify-content-center fuente-poppins" type="submit"
                           name="submit" value="Enviar" />
                        <span class="spinner-border text-success spinner-border-sm" id="spinnerPersona" role="status"
                           aria-hidden="true" style="width: 1.4rem;height: 1.4rem;margin-right: 8px;display: none;">
                        </span>
                     </span>
                  </div>
                  <div class="col-12 text-center mt-3 fuente-roboto">
                     <p class="font-size: 0.9rem campos-persona-natural" style="margin-left: 7%;">Al Hacer clic en
                        enviar, Usted manifiesta su consentimiento para
                        que IBCORP realice el tratamiento de sus datos
                        personales, <br> conforme a las <a href=" pdf/Terminos_y_condiciones.pdf" target="blank">
                           Condiciones y
                           T&eacute;rminos detallados en la sección
                           Pol&iacute;tica de Tratamiento de Datos
                           Personales.</a></p>
                  </div>
               </div> <!-- /row -->
            </div>
         </form>



         <form class="ajaxempresa" action="controller/enviar-correo-contact.php" method="POST" id="formEmpresa">
            @csrf

            <!-- Empresa -->
            <div class="row pt-5 justify-content-center row_contacto_principal">
               <div class="col-lg-5 campos-persona-empresa">
                  <label for="empresa" class="pt-3 form-label">Empresa:</label>
                  <input required type="empresa" class="form-control inp" id="empresa" name="empresa"
                     placeholder="Ingrese el nombre de su empresa" />
                  <p id="obligatorio-message-emp" style="color: red; display: none;">*Este
                     campo es obligatorio</p>
               </div>

               <div class="col-lg-5 campos-persona-empresa">
                  <label for="rubro" class="pt-3 form-label">Rubro de
                     Empresa:</label>
                  <select required class="form-control" id="rubro" name="rubro">
                     <option selected="" disabled="" value="">Elige un rubro:
                     </option>
                     <option value="Construccion">
                        Construccion</option>
                     <option value="Electricidad">
                        Electricidad</option>
                     <option value="Hidrocarburos">
                        Hidrocarburos</option>
                     <option value="Industrial">Industrial
                     </option>
                     <option value="Ingenieria">Ingenieria
                     </option>
                     <option value="Mineria">Mineria</option>
                     <option value="Otros">Otros</option>
                  </select>
               </div>

               <div class="col-lg-5 campos-persona-empresa">
                  <label for="ruc" class="pt-3 form-label">RUC:</label>
                  <input required type="text" class="form-control inp" id="ruc" name="ruc" pattern="[0-9]+"
                     placeholder="Ingrese el número RUC de su empresa" />
                  <p id="obligatorio-message-ruc" style="color: red; display: none;">*Este
                     campo es obligatorio</p>
                  <p id="incorrecto-message-ruc" style="color: red; display: none;">
                     *Ingrese solo números en este campo</p>
               </div>

               <div class="col-lg-5 campos-persona-empresa">
                  <label for="cargo" class="pt-3 form-label">Cargo:</label>
                  <input required type="text" class="form-control inp" id="cargo" name="cargo"
                     placeholder="Ingrese su cargo" />
                  <p id="obligatorio-message-car" style="color: red; display: none;">*Este
                     campo es obligatorio</p>
               </div>
               <div class="col-lg-5 campos-persona-empresa">
                  <label for="telefono" class="pt-3 form-label">Teléfono
                     Fijo:</label>
                  <div class="input-group flex-nowrap">
                     <span class="input-group-text" id="spTelefono">01</span>
                     <input type="text" class="form-control inp" id="telefono" name="telefono" pattern="[2-7][0-9]{6}"
                        oninvalid="setCustomValidity('Ingrese un número valido para Lima-Perú')"
                        oninput="setCustomValidity('')" maxlength="7" minlength="7"
                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="Tel.(Opcional)"
                        aria-describedby="basic-addon1" autocomplete="off">
                  </div>
                  <p id="obligatorio-mesage-tel" style="color: red; display: none;">*Este
                     campo es obligatorio</p>
                  <p id="incorrecto-message-tel" style="color: red; display: none;">
                     *Ingrese solo números en este campo</p>
               </div>

               <div class="col-lg-5 campos-persona-empresa">
                  <label for="celular" class="pt-3 form-label">Celular:</label>
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
               <div class="col-lg-5 campos-persona-empresa">
                  <label for="emailEmpresa" class="pt-3 form-label">Email
                     empresa:</label>
                  <input required type="email" class="form-control inp" id="emailEmpresa" name="emailEmpresa"
                     placeholder="enterprise@org.pe" />
                  <p id="obligatorio-message-car" style="color: red; display: none;">*Este
                     campo es obligatorio</p>
               </div>

               <div class="col-lg-5 campos-persona-empresa">
                  <label for="tipoSeguroEmpresa" class="pt-3 form-label">Seguro que
                     desea cotizar:</label>
                  <select required class="form-control" id="tipoSeguroEmpresa" name="tipoSeguroEmpresa">
                     <option selected disabled value="">Elige el seguro :</option>
                     <option value="Cascos Marítimos">Cascos Marítimos</option>
                     <option value="Caución/Crédito">Caución/Crédito</option>
                     <option value="Contratistas de Todo Riesgo - CAR">Contratistas de Todo Riesgo - CAR</option>
                     <option value="Entidades Prestadoras de Salud - EPS">Entidades Prestadoras de Salud - EPS</option>
                     <option value="Equipo de Aseguramiento de Riesgos- EAR">Equipo de Aseguramiento de Riesgos- EAR
                     </option>
                     <option value="Equipo Electrónico">Equipo Electrónico</option>
                     <option value="Lucro Cesante">Lucro Cesante</option>
                     <option value="Multirriesgo">Multirriesgo</option>
                     <option value="Responsabilidad Civil">Responsabilidad Civil</option>
                     <option value="Robo y Asalto">Robo y Asalto</option>
                     <option value="Seguro 3D">Seguro 3D</option>
                     <option value="Seguro Complementario de Trabajo de Riesgo - SCTR">Seguro Complementario de Trabajo
                        de Riesgo - SCTR</option>
                     <option value="Seguro de Salud">Seguros de Salud</option>
                     <option value="Seguro de Transporte">Seguro de Transporte</option>
                     <option value="Seguro Obligatorio de Accidentes de Tránsito - SOAT">Seguro Obligatorio de
                        Accidentes de Tránsito - SOAT</option>
                     <option value="Seguros Académicos">Seguros Académicos</option>
                     <option value="Seguros Contra Accidentes">Seguros Contra Accidentes</option>
                     <option value="Seguros Contra Incendios">Seguros Contra Incendios</option>
                     <option value="Seguros Contra Rotura de Maquinaria">Seguros Contra Rotura de Maquinaria</option>

                     <option value="Seguros Oncológico">Seguros Oncológico</option>
                     <option value="Seguros Vehicular">Seguros Vehicular</option>
                     <option value="Seguros de Ahorro">Seguros de Ahorro</option>
                     <option value="Seguros de Hogar">Seguros de Hogar</option>
                     <option value="Seguros de Vida a Corto Plazo">Seguros de Vida a Corto Plazo</option>
                     <option value="Seguros de Vida a Largo Plazo">Seguros de Vida a Largo Plazo</option>
                     <option value="Seguros de Viajes">Seguros de Viajes</option>
                     <option value="Todo Riesgo Equipo de Contratista - TREC">Todo Riesgo Equipo de Contratista - TREC
                     </option>
                     <option value="Vida Ley">Vida Ley</option>
                  </select>
               </div>
               <!-- Fin empresa -->

               <div class="col-lg-10 mx-auto campos-persona-empresa">
                  <label class="pt-3 form-label">Mensaje:</label>
                  <textarea required class="form-control" rows="3" id="mensajePersona" name="mensajePersona"
                     placeholder="Ingrese su mensaje aquí..."></textarea>
                  <br>
               </div>

               <div class="col-lg-12 text-center mb-4 mt-3 campos-persona-empresa">
                  <span class="help-block">
                     <input required class="btn btn-warning btn-lg marginlastmin justify-content-center" type="submit"
                        name="submit" value="Enviar" />
                     <span class="spinner-border text-success spinner-border-sm" id="spinnerEmpresa" role="status"
                        aria-hidden="true" style="width: 1.4rem;height: 1.4rem;margin-right: 8px;display: none;">
                     </span>
                  </span>
               </div>

               <p class="pt-3 campos-persona-empresa form-label" style="margin-left: 8%;">Al Hacer clic en
                  enviar, Usted manifiesta su consentimiento para
                  que IBCORP realice el tratamiento de sus datos
                  personales, conforme a las <a href="pdf/Terminos_y_condiciones.pdf" target="blank"> Condiciones
                     y
                     Términos detallados en la sección
                     Política de Tratamiento de Datos
                     Personales.</a></p>
            </div> <!-- /row -->
         </form>
      </div><!-- /div container -->
   </form>
</body>

</html>