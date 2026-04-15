<?php

use App\Mail\ContactanosMailable;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CorreoController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\HistorialMedicoController;

use App\Http\Controllers\SeguroController;

Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/seguros', [HomeController::class, 'seguros'])->name('seguros');
Route::get('/agente', [HomeController::class, 'agentes'])->name('agentes');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');

Route::get('/vision', [HomeController::class, 'vision'])->name('vision');
Route::get('/valores', [HomeController::class, 'valores'])->name('valores');

Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::get('/consultas', [HomeController::class, 'consultas'])->name('consultas');
// Route::get('/2',[HomeController::class,'index2']);

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');

// Rutas para cliente y supervisor con middleware de tipo de usuario
Route::middleware(['auth'])->group(function () {
    // Rutas existentes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('user.type:admin');
    Route::get('/admin/seguros', [AdminController::class, 'seguros'])->name('admin.seguros')->middleware('user.type:admin');
    Route::get('/admin/solicitudes', [AdminController::class, 'solicitudes'])->name('admin.solicitudes')->middleware('user.type:admin');

    // Nuevas rutas para cliente y supervisor
    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.dashboard')->middleware('user.type:cliente');
    Route::get('/cliente/polizas', [ClienteController::class, 'polizaIndex'])->name('cliente.polizas.index')->middleware('user.type:cliente');
    Route::get('/cliente/polizas/{id}', [ClienteController::class, 'polizaShow'])->name('cliente.polizas.show')->middleware('user.type:cliente');
    Route::get('/cliente/polizas/{id}/pdf', [ClienteController::class, 'polizaPDF'])->name('cliente.polizas.pdf')->middleware('user.type:cliente');
    Route::post('/cliente/contactar-asesor', [ClienteController::class, 'contactarAsesor'])->name('cliente.contactar-asesor')->middleware('user.type:cliente');
    Route::get('/supervisor', [SupervisorController::class, 'index'])->name('supervisor.dashboard')->middleware('user.type:supervisor');
    // Rutas para el historial médico
    Route::get('/admin/historial-medico', [App\Http\Controllers\HistorialMedicoController::class, 'index'])->name('admin.historial-medico.index')->middleware('user.type:admin');
    Route::get('/admin/historial-medico/{id}', [App\Http\Controllers\HistorialMedicoController::class, 'show'])->name('admin.historial-medico')->middleware('user.type:admin');
    Route::get('/admin/historial-medico/{id}/pdf', [App\Http\Controllers\HistorialMedicoController::class, 'descargarPDF'])->name('admin.historial-medico.pdf')->middleware('user.type:admin');

    // Ruta para enviar historial médico por email
    Route::get('/admin/historial-medico/{id}/enviar-email', [App\Http\Controllers\HistorialMedicoController::class, 'enviarPorEmail'])->name('admin.historial-medico.enviar-email')->middleware('user.type:admin');

    // Ruta para notificaciones
    Route::get('/admin/notificaciones', [AdminController::class, 'notificaciones'])->name('admin.notificaciones.index')->middleware('user.type:admin');
    Route::get('/admin/notificaciones/{id}', [AdminController::class, 'verNotificacion'])->name('admin.notificaciones.ver')->middleware('user.type:admin');
});

Route::get('seguros/solicitar-seguro', [SeguroController::class, 'solicitarSeguro']); // ruta fija
Route::get('seguros/{link}', [SeguroController::class, 'detalle']); // ruta dinámica

Route::get('contactanos', function () {

    //Mail::to('rogercancha@gmail.com')->send(new ContactanosMailable);// Enviar a correo, MENSAJE SALTA ERROR POR NO DETECTAR EL ARCHIVO CONTACTANOSMAILABLE.PHP
    //return 'Correo enviado correctamente';
});

// Ruta para enviar el correo de contacto
Route::post('enviar-form-empresa-contacto', [ContactoController::class, 'enviarCorreoEmpresa'])->name('enviar-form-empresa-consulta');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Añadir estas líneas después de las rutas de login existentes
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register.post');
Route::post('/enviar-form-persona-contacto', [ContactoController::class, 'enviarCorreoPersona'])->name('enviar-form-persona-contacto');
