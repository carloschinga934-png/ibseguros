<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto Mejorado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        select.form-control {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
         background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23283b85' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
         background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
        color: #333;

        /* 👇 Ajustes clave */
       padding: 10px 40px 10px 45px; 
        line-height: 1.5; 
       height: auto; 
     }
        :root {
            --primary-color: #283b85;
            --secondary-color: #3a56b4;
            --accent-color: #ff6b00;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #28a745;
            --error-color: #dc3545;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fb;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        
        .form-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .form-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 2.2rem;
        }
        
        .form-subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }
        
        .contact-form {
            margin-top: 20px;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px 20px;
        }
        
        .form-group {
            flex: 1 0 calc(50% - 20px);
            margin: 0 10px;
            position: relative;
            min-width: 250px;
        }
        
        .full-width .form-group {
            flex: 1 0 calc(100% - 20px);
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 1.1rem;
            z-index: 2;
        }
        
        .textarea-container i {
            top: 25px;
            transform: none;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px 12px 45px;
            border: 2px solid #e1e1e1;
            width: 100%;
            transition: all 0.3s;
            font-size: 1rem;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23283b85' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(40, 59, 133, 0.25);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
        
        .validation-message {
            font-size: 0.85rem;
            margin-top: 5px;
            color: #666;
        }
        
        .submit-row {
            margin-top: 30px;
            justify-content: flex-end;
        }
        
        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .submit-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        #spinnerPersona {
            display: none;
        }
        
        #respuestaFormContacto {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .success-message {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(40, 167, 69, 0.2);
        }
        
        .error-message-response {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--error-color);
            border: 1px solid rgba(220, 53, 69, 0.2);
        }
        
        /* Validación visual */
        .form-control:invalid:not(:focus):not(:placeholder-shown) {
            border-color: var(--error-color);
        }
        
        .form-control:valid:not(:focus):not(:placeholder-shown) {
            border-color: #ced4da;
        }
        
        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
            }
            
            .form-group {
                flex: 1 0 calc(100% - 20px);
            }
            
            .form-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3 class="form-title">¿Deseas Contactarnos?</h3>
        <p class="form-subtitle">¡Bríndanos tus datos y nos estaremos comunicando contigo lo antes posible!</p>

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
                        <select required class="form-control" id="tipoSeguro" name="tipoSeguro">
                            <option value="">Seleccione tipo de seguro</option>
                            <option value="Seguro de Vida">Seguro de Vida</option>
                            <option value="Seguro de Auto">Seguro de Auto</option>
                            <option value="Seguro de Hogar">Seguro de Hogar</option>
                            <option value="Seguro de Salud">Seguro de Salud</option>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formulario = document.getElementById('formularioContacto');
            const respuestaDiv = document.getElementById('respuestaFormContacto');
            
            // Validación en tiempo real
            const campos = formulario.querySelectorAll('input, textarea, select');
            campos.forEach(campo => {
                campo.addEventListener('blur', function() {
                    validarCampo(this);
                });
                
                campo.addEventListener('input', function() {
                    limpiarMensajesError(this);
                });
            });
            
            // Función para validar cada campo
            function validarCampo(campo) {
                limpiarMensajesError(campo);
                
                if (!campo.value.trim()) {
                    mostrarError(campo, 'obligatorio');
                    return false;
                }
                
                if (campo.type === 'email' && !validarEmail(campo.value)) {
                    document.getElementById('email-validation-message').textContent = '*Ingrese un email válido';
                    document.getElementById('email-validation-message').style.color = 'var(--error-color)';
                    return false;
                }
                
                if (campo.hasAttribute('pattern')) {
                    const regex = new RegExp(campo.getAttribute('pattern'));
                    if (!regex.test(campo.value)) {
                        mostrarError(campo, 'incorrecto');
                        return false;
                    }
                }
                
                // Validación específica para email
                if (campo.type === 'email' && validarEmail(campo.value)) {
                    document.getElementById('email-validation-message').textContent = '✓ Email válido';
                    document.getElementById('email-validation-message').style.color = 'var(--success-color)';
                }
                
                return true;
            }
            
            function validarEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
            
            function mostrarError(campo, tipo) {
                const id = campo.id;
                const mensajeError = document.getElementById(`${tipo}-message${id !== 'email' ? '-' + id : ''}`);
                if (mensajeError) {
                    mensajeError.style.display = 'block';
                }
            }
            
            function limpiarMensajesError(campo) {
                const id = campo.id;
                const errores = document.querySelectorAll(`.error-message${id !== 'email' ? '[id*="' + id + '"]' : ''}`);
                errores.forEach(error => {
                    error.style.display = 'none';
                });
                
                if (campo.type === 'email') {
                    document.getElementById('email-validation-message').textContent = '';
                }
            }
            
            // Envío del formulario
            formulario.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Validar todos los campos antes de enviar
                let formularioValido = true;
                campos.forEach(campo => {
                    if (!validarCampo(campo)) {
                        formularioValido = false;
                    }
                });
                
                if (!formularioValido) {
                    respuestaDiv.textContent = "Por favor, complete todos los campos correctamente.";
                    respuestaDiv.className = 'error-message-response';
                    return;
                }
                
                // Muestra el spinner de carga
                document.getElementById('spinnerPersona').style.display = 'inline-block';
                
                try {
                    // Recopila los datos del formulario
                    const formData = new FormData(this);
                    
                    // Simulación de envío (reemplazar con tu endpoint real)
                    // Envía los datos al servidor usando Fetch API
                    let response = await fetch('{{ route('enviar-form-persona-contacto') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    let data = await response.json();
                    console.log(data);
                    
                    // Ocultar spinner
                    document.getElementById('spinnerPersona').style.display = 'none';
                    
                    if (data.status === 'success') {
                        // Limpia el formulario si el envío fue exitoso
                        formulario.reset();
                        respuestaDiv.textContent = "Consulta enviada correctamente. Nos pondremos en contacto contigo pronto.";
                        respuestaDiv.className = 'success-message';
                    } else {
                        // Muestra mensajes de error
                        let mensajes = [];
                        if (data.errors) {
                            for (let campo in data.errors) {
                                mensajes.push(data.errors[campo][0]);
                            }
                            respuestaDiv.textContent = mensajes.join("\n");
                        } else {
                            respuestaDiv.textContent = "Hubo un error al enviar el formulario. Por favor, intente nuevamente.";
                        }
                        respuestaDiv.className = 'error-message-response';
                    }
                } catch (error) {
                    console.error('Error:', error);
                    document.getElementById('spinnerPersona').style.display = 'none';
                    respuestaDiv.textContent = "Error de conexión. Por favor, intente nuevamente.";
                    respuestaDiv.className = 'error-message-response';
                }
            });
        });
    </script>
</body>
</html>