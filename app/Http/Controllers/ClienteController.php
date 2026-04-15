<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\HistorialMedico;
use App\Models\PolizaSalud;
use Barryvdh\DomPDF\Facade\Pdf;

class ClienteController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Obtener el historial médico del usuario si existe
        $historialMedico = $user->historialMedico;
        
        // Inicializar variables
        $polizas = collect();
        $polizasActivas = 0;
        $polizasProximasVencer = 0;
        $reclamaciones = 0;
        
        // Si el usuario tiene historial médico, obtener sus pólizas
        if ($historialMedico) {
            $polizas = $historialMedico->polizas;
            
            // Contar pólizas activas
            $polizasActivas = $polizas->where('estado', 'activo')->count();
            
            // Contar pólizas próximas a vencer (30 días)
            $fechaLimite = now()->addDays(30);
            $polizasProximasVencer = $polizas->where('estado', 'activo')
                ->where('fecha_vencimiento', '<=', $fechaLimite)
                ->where('fecha_vencimiento', '>=', now())
                ->count();
            
            // Contar reclamaciones (atenciones médicas)
            $reclamaciones = $polizas->flatMap->atenciones->count();
        }
        
        return view('cliente.dashboard', compact(
            'user', 
            'polizas', 
            'polizasActivas', 
            'polizasProximasVencer', 
            'reclamaciones'
        ));
    }
    
    public function polizaIndex()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Obtener el historial médico del usuario si existe
        $historialMedico = $user->historialMedico;
        
        // Inicializar variables
        $polizas = collect();
        
        // Si el usuario tiene historial médico, obtener sus pólizas
        if ($historialMedico) {
            $polizas = $historialMedico->polizas;
        }
        
        // Obtener todos los tipos de seguro disponibles para el filtro
        $tiposSeguros = PolizaSalud::distinct('tipo_seguro')
            ->pluck('tipo_seguro')
            ->filter()
            ->unique()
            ->values();
        
        return view('cliente.poliza-index', compact('user', 'polizas', 'tiposSeguros'));
    }
    
    /**
     * Muestra los detalles de una póliza específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function polizaShow($id)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Obtener el historial médico del usuario
        $historial = $user->historialMedico;
        
        // Verificar que el historial exista
        if (!$historial) {
            return redirect()->route('cliente.dashboard')
                ->with('error', 'No se encontró el historial médico.');
        }
        
        // Buscar la póliza por ID y verificar que pertenezca al historial del usuario
        $poliza = PolizaSalud::with(['coberturas', 'atenciones'])
            ->where('id', $id)
            ->where('historial_medico_id', $historial->id)
            ->firstOrFail();
        
        // Obtener el cliente (usuario) asociado al historial
        $cliente = $user;
        
        return view('cliente.poliza', compact('historial', 'cliente', 'poliza'));
    }
    
    /**
     * Genera un PDF del historial médico del cliente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function polizaPDF($id)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Obtener el historial médico del usuario
        $historial = $user->historialMedico;
        
        // Verificar que el historial exista
        if (!$historial) {
            return redirect()->route('cliente.dashboard')
                ->with('error', 'No se encontró el historial médico.');
        }
        
        // Buscar la póliza por ID y verificar que pertenezca al historial del usuario
        $poliza = PolizaSalud::with(['coberturas', 'atenciones'])
            ->where('id', $id)
            ->where('historial_medico_id', $historial->id)
            ->firstOrFail();
        
        // Obtener el cliente (usuario) asociado al historial
        $cliente = $user;
        
        // Generar el PDF con la vista
        $pdf = PDF::loadView('cliente.poliza-pdf', [
            'historial' => $historial,
            'cliente' => $cliente,
            'poliza' => $poliza
        ]);
        
        // Descargar el PDF con un nombre específico
        return $pdf->download('historial-medico-' . $historial->id . '.pdf');
    }
    
    /**
     * Procesa el formulario de contacto con asesor y crea una notificación.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactarAsesor(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'prioridad' => 'required|in:baja,normal,alta,urgente',
        ]);
        
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Crear una nueva notificación
        $notificacion = new \App\Models\Notificacion([
            'user_id' => $user->id,
            'tipo' => 'mensaje',
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'estado' => 'no_leida',
            'prioridad' => $request->prioridad,
            'numero_referencia' => 'MSG-' . time() . '-' . $user->id,
            'fecha_notificacion' => now(),
        ]);
        
        $notificacion->save();
        
        return redirect()->route('cliente.dashboard')
            ->with('success', 'Tu mensaje ha sido enviado correctamente. Un asesor se pondrá en contacto contigo pronto.');
    }
}



