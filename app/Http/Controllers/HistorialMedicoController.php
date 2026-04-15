<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HistorialMedico;
use App\Models\User;
use App\Models\PolizaSalud;
use App\Models\Cobertura;
use App\Models\AtencionMedica;
use Response;
use App\Mail\HistorialMedicoPDF;
use Illuminate\Support\Facades\Mail;

class HistorialMedicoController extends Controller
{
   /**
    * Muestra la lista de historiales médicos.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
      // Iniciar la consulta base para PolizaSalud
      $query = PolizaSalud::with(['historialMedico.user']);

      // Aplicar filtro por nombre si existe
      if ($request->filled('nombre')) {
         $query->whereHas('historialMedico.user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->nombre . '%');
         });
      }

      // Aplicar filtro por DNI si existe
      if ($request->filled('dni')) {
         $query->whereHas('historialMedico.user', function ($q) use ($request) {
            $q->where('dni', 'like', '%' . $request->dni . '%');
         });
      }

      // Aplicar filtro por tipo de seguro si existe
      if ($request->filled('tipo_seguro')) {
         $query->where('tipo_seguro', $request->tipo_seguro);
      }

      // Obtener las pólizas paginadas (10 por página)
      $polizas = $query->paginate(10)->withQueryString();

      // Obtener todos los tipos de seguro disponibles para el filtro
      $tiposSeguros = PolizaSalud::distinct('tipo_seguro')
         ->pluck('tipo_seguro')
         ->filter()
         ->unique()
         ->values();

      return view('admin.historial-medico-index', compact('polizas', 'tiposSeguros'));
   }

   /**
    * Muestra el detalle de un historial médico específico.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      // Obtener el historial médico con sus relaciones
      $historial = HistorialMedico::with([
         'user',
         'polizas.coberturas',
         'polizas.atenciones'
      ])->findOrFail($id);

      // Obtener el cliente (usuario) asociado al historial
      $cliente = $historial->user;

      return view('admin.historial-medico', compact('historial', 'cliente'));
   }

   /**
    * Genera un PDF del historial médico.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function descargarPDF($id)
   {
      // Obtener el historial médico con sus relaciones
      $historial = HistorialMedico::with([
         'user',
         'polizas.coberturas',
         'polizas.atenciones'
      ])->findOrFail($id);

      // Obtener el cliente (usuario) asociado al historial
      $cliente = $historial->user;

      // Generar el PDF con la vista
      $pdf = PDF::loadView('admin.historial-medico-pdf', [
         'historial' => $historial,
         'cliente' => $cliente,
         'id' => $id
      ]);

      // Descargar el PDF con un nombre específico
      return $pdf->download('historial-medico-' . $id . '.pdf');
   }


   public function enviarPorEmail($id)
   {
      $historial = HistorialMedico::with([
         'user',
         'polizas.coberturas',
         'polizas.atenciones'
      ])->findOrFail($id);

      $cliente = $historial->user;

      // Generar el PDF en memoria
      $pdf = PDF::loadView('admin.historial-medico-pdf', [
         'historial' => $historial,
         'cliente' => $cliente,
         'id' => $id
      ]);

      // Enviar correo con el PDF adjunto
      Mail::to($cliente->email)->send(new HistorialMedicoPDF($pdf->output(), $cliente));

      return redirect()->back()->with('success', 'Se ha enviado el historial médico. Revisa tu correo.');
   }
}
