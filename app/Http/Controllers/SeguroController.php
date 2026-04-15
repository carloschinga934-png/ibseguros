<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeguroController extends Controller
{
   public function detalle($link)
   {
      $json = file_get_contents(public_path('data/seguros.json'));
      $seguros = json_decode($json);

      $seguroDetalle = collect($seguros)->firstWhere('link', $link);

      return view('shared.Layout', [
         'renderBody' => view('seguros.seguro-vista', [
            'seguroDetalle' => $seguroDetalle,
            'seguro' => collect($seguros),
         ])
      ]);
   }

   public function solicitarSeguro($tipoSeguro = null)
   {
      return view('shared.Layout', [
         'renderBody' => view('seguros.seguro-solicitud', compact('tipoSeguro'))
      ]);
   }
}
