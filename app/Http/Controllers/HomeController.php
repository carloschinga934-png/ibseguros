<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoEnvio;

class HomeController extends Controller
{
   public function index()
   {
      $json = file_get_contents(public_path('data/seguros.json'));
      $seguros = json_decode($json);
      // Ruta al JSON
      $jsonInfoSegurosParaContacto = public_path('data/contacto.json');

      // Leer y decodificar
      $optionsItemsDelJson = json_decode(file_get_contents($jsonInfoSegurosParaContacto), true);

      $data = collect($seguros);
      $optionsItems = collect($optionsItemsDelJson);
      
      return view('shared.Layout', [
         'renderBody' => view('home.inicio', [
            'seguro' => $data,
            'optionsItems' => $optionsItems
         ])
      ]);
   }

   public function seguros()
   {
      // Ruta al JSON
      $jsonPath = public_path('data/seguros.json');

      // Leer y decodificar
      $listaSeguros = json_decode(file_get_contents($jsonPath), true);

      $data = [
         'renderBody' => view('home.seguros', compact('listaSeguros'))
      ];

      return view('shared/Layout', $data);
   }

   public function agentes()
   {
      // Ruta al JSON
      $jsonPath = public_path('data/agente.json');

      // Leer y decodificar
      $carruselItems = json_decode(file_get_contents($jsonPath), true);

      $data = [
         'renderBody' => view('home.agente', compact('carruselItems'))
      ];

      return view('shared/Layout', $data);
   }

public function nosotros()
{
   $jsonInfoSegurosParaContacto = public_path('data/contacto.json');
   $optionsItemsDelJson = json_decode(file_get_contents($jsonInfoSegurosParaContacto), true);
   $optionsItems = collect($optionsItemsDelJson);

   $data = [
      'renderBody' => view('home.nosotros', compact('optionsItems'))
   ];

   return view('shared/Layout', $data);
}

   public function valores()
   {
      $data = [
         'renderBody' => view('home.valores')
      ];

      return view('shared/Layout', $data);
   }

   public function vision()
   {
      $data = [
         'renderBody' => view('home.vision')
      ];

      return view('shared/Layout', $data);
   }

   public function contacto()
   {
      // Ruta al JSON
      $jsonPath = public_path('data/contacto.json');

      // Leer y decodificar
      $optionsItems = json_decode(file_get_contents($jsonPath), true);
      
      $data = [
         'renderBody' => view('contacto.contacto', compact(var_name: 'optionsItems'))
      ];

      return view('shared/Layout', $data);
   }

   public function consultas()
   {
      $data = [
         'renderBody' => view('home.consultas')
      ];

      return view('shared/Layout', $data);
   }
}
