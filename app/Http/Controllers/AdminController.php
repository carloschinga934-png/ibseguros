<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacion;
use App\Models\HistorialMedico;
use App\Models\User;
use App\Models\PolizaSalud;

class AdminController extends Controller
{

    public function index()
    {
        // Obtener las notificaciones más recientes (limitadas a 3)
        $notificaciones = Notificacion::orderBy('fecha_notificacion', 'desc')
            ->take(3)
            ->get();
            
        // Obtener estadísticas para el resumen
        $nuevasPolizas = PolizaSalud::where('estado', 'activo')
            ->whereDate('fecha_contratacion', '>=', now()->subDays(30))
            ->count();
            
        $reclamacionesPendientes = Notificacion::where('tipo', 'reclamacion')
            ->where('estado', 'no_leida')
            ->count();
            
        $mensajesClientes = Notificacion::where('tipo', 'mensaje')
            ->where('estado', 'no_leida')
            ->count();
            
        // Obtener historiales médicos con sus usuarios y pólizas (limitados a 3)
        $historiales = HistorialMedico::with(['user', 'polizas' => function($query) {
            $query->orderBy('fecha_contratacion', 'desc');
        }])
        ->take(3)
        ->get();
        
        return view('admin.dashboard', compact(
            'notificaciones', 
            'nuevasPolizas', 
            'reclamacionesPendientes', 
            'mensajesClientes',
            'historiales'
        ));
    }

   public function seguros()
   {
      return view('admin.seguros.index');
   }

    public function solicitudes()
    {
        return view('admin.solicitudes.index');
    }
    
    public function notificaciones(Request $request)
    {
        // Iniciar la consulta
        $query = Notificacion::query();
        
        // Aplicar filtros si están presentes
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }
        
        if ($request->filled('prioridad')) {
            $query->where('prioridad', $request->prioridad);
        }
        
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }
        
        // Ordenar por fecha y paginar
        $notificaciones = $query->orderBy('fecha_notificacion', 'desc')->paginate(10);
        
        // Mantener los parámetros de filtrado en la paginación
        $notificaciones->appends($request->all());
        
        return view('admin.notificaciones-index', compact('notificaciones'));
    }
    
    public function verNotificacion($id)
    {
        // Obtener la notificación específica
        $notificacion = Notificacion::findOrFail($id);
        
        // Si la notificación está sin leer, marcarla como leída
        if ($notificacion->estado == 'no_leida') {
            $notificacion->estado = 'leida';
            $notificacion->save();
        }
        
        return view('admin.notificacion-detalle', compact('notificacion'));
    }
}
