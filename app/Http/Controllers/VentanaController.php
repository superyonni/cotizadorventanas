<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventana;
use Barryvdh\DomPDF\Facade\Pdf; //pdf
class VentanaController extends Controller


{

  public function generarPDF(Request $request)
  {

    $ventanas = Ventana::all();
    // Obtener los datos del formulario
    $nombre = $request->input('name');
    $celular = $request->input('cellphone');
    $lineaVentana = $request->input('lineaVentana');
    $alturas = $request->input('alto', []);
    $anchos = $request->input('ancho', []);
    $hojas = $request->input('hojas', []);
    $colores = $request->input('color', []);
    $cantidades = $request->input('cantidad', []);
    

    if ($lineaVentana == 20) {
      $ventanas = Ventana::whereBetween('id', [1, 25])->get();
      $precios = [];
      foreach ($ventanas as $ventana) {
          $precios[$ventana->nombre] = $ventana->costo_unitario;
      }
  } elseif ($lineaVentana == 25) {
      $ventanas = Ventana::whereNotIn('id', [1, 2, 3, 4, 5, 6, 12])->get();
      $precios = [];
      foreach ($ventanas as $ventana) {
          $precios[$ventana->nombre] = $ventana->costo_unitario;
      }
  } else {
      $ventanas = Ventana::all();
      $precios = [];
      foreach ($ventanas as $ventana) {
          $precios[$ventana->nombre] = $ventana->costo_unitario;
      }
  }

  $colorPrecios = [];
  foreach ($ventanas as $ventana) {
      $colorPrecios[$ventana->nombre] = $ventana->costo_unitario;
  }
    // Procesar los datos y realizar los cálculos
    $detalles = [];
    for ($i = 0; $i < count($alturas); $i++) {
      $altura = $alturas[$i] * 100; // Convertir a centímetros
      $ancho = $anchos[$i] * 100; // Convertir a centímetros
      $hoja = isset($hojas[$i]) ? $hojas[$i] : 2;
        $color = isset($colores[$i]) ? $colores[$i] : 'Incoloro';
      $cantidad = isset($cantidades[$i]) ? $cantidades[$i] : 1;


      // Calcular los valores para la estructura
      $rielSuperior = $lineaVentana == 25 ? number_format($ancho - 1.60, 2) : number_format($ancho - 1.20, 2);
      $rielInferior = $rielSuperior;
      $jamba = $altura;
      $jambaTotal = $jamba * 2;

      // Calcular los valores para la hoja o paño
      $parante = $lineaVentana == 25 ? number_format($altura - 3.50, 2) : number_format($altura - 2.5, 2);
      $gancho = $parante;
      $paranteTotal = $parante * $hoja;
      $ganchoTotal = $gancho * $hoja;
      // Calcular el valor de $zocalo


      if ($lineaVentana == 20) {
        if ($hoja == 2) {
          $zocalo = number_format(($ancho - 13) / $hoja, 2);
        } elseif ($hoja == 3) {
          $zocalo = number_format(($ancho - 15.5) / $hoja, 2);
        } elseif ($hoja == 4) {
          $zocalo = number_format(($ancho - 25) / $hoja, 2);
        }
      } elseif ($lineaVentana == 25) {
        if ($hoja == 2) {
          $zocalo = number_format(($ancho - 16) / $hoja, 2);
        } elseif ($hoja == 3) {
          $zocalo = number_format(($ancho - 19.5) / $hoja, 2);
        } elseif ($hoja == 4) {
          $zocalo = number_format(($ancho - 30) / $hoja, 2);
        }
      }

      $hojaunion = 0;
      if ($hoja == 4) {
        $hojaunion = $lineaVentana == 25 ? number_format($altura - 3.50, 2) : number_format($altura - 2.5, 2);
      }

      $pza = $hojaunion;
      if ($hoja == 4) {
        $pza = 1;
      }
      // Calcular el valor de $zocaloTotal
      if (is_numeric($zocalo) && is_numeric($hoja)) {
        $zocaloTotal = round(($zocalo * ($hoja * 2)), 2);
      } else {
        $zocaloTotal = 0;
      }

      // Calcular los totales lineales
      $totalLineal = $jambaTotal  + $zocaloTotal + $pza + $hojaunion + $ganchoTotal + $paranteTotal + $rielInferior + $rielSuperior;

      $cantidadBarras = number_format($totalLineal / 235, 2);

      // Calcular los valores para el vidrio
      if ($lineaVentana == 20) {
        $altoVidrio = $parante - 8.20;
      } else {
        $altoVidrio = $parante - 11.7;
      }

      if ($lineaVentana == 20) {
        $anchoVidrio = $zocalo + 1.60;
      } else {
        $anchoVidrio = $zocalo + 1.30;
      }

      $areaVidrio = number_format(($altoVidrio / 100) * ($anchoVidrio / 100) * $hoja, 2);
      $silicona = number_format(((($rielInferior + $rielSuperior + $jambaTotal) / 100) / 11) * 2, 2);
      $Burlet = number_format(($paranteTotal + $ganchoTotal + $zocaloTotal), 2);
      $Felpa = number_format(($jambaTotal + $ganchoTotal + ($zocalo * 2)), 2);

      if ($hoja == 3) {
        $Rodamientos = 2;
      } else {
        $Rodamientos = number_format($hoja, 2);
      }

      if ($hoja == 2 || $hoja == 3) {
        $Picoloro = 1;
      } elseif ($hoja == 4) {
        $Picoloro = 2;
      } else {
        $Picoloro = number_format($hoja, 2);
      }
      $Tornillojamba = number_format(2*4);
      $Tornillohoja = number_format($hoja * 4, 2);
      $Tornillofijar = number_format($hoja * 2, 2);
      $Tornilloempotre = number_format(($hoja * 2) * 2, 2);

      $Crielsuperior = ($rielSuperior / 100);
      $Crielinferior = ($rielInferior / 100);
      $Cjamba = ($jambaTotal / 100);
      $Cparante = ($paranteTotal / 100);
      $Cgancho = ($ganchoTotal / 100);
      $Czocalo = ($zocaloTotal / 100);
      $Chojaunion = ($hojaunion / 100);

      $subrielsuperior = number_format($Crielsuperior * $precios['Perfil Riel Superior'], 2);
      $subrielinferior = number_format($Crielinferior * $precios['Perfil Riel Inferior'], 2);
      $subjamba = number_format($Cjamba * $precios['Perfil Jamba'], 2);
      $subparante = number_format($Cparante * $precios['Perfil Parante'], 2);
      $subgancho = number_format($Cgancho * $precios['Perfil Gancho'], 2);
      $subzocalo = number_format($Czocalo * $precios['Perfil Zocalo'], 2);
      $subunion = number_format($Chojaunion * $precios['Perfil Union de Hoja'], 2);

      $precioPorColor = number_format(($colorPrecios[$color] ?? 0) / 4.2, 2);

      $subvidrio = number_format($areaVidrio * ($precioPorColor),2);
      $subsilicona = number_format($silicona * $precios['Silicona'],2);
      $subburlet = number_format(($Burlet/100) * $precios['Burlet'],2);
      $subfelpa = number_format(($Felpa/100) * $precios['Felpa'],2);
      $subrodamientos = number_format($Rodamientos * $precios['Rodamientos'],2);
      $subpicoloro = number_format($Picoloro * $precios['Pico de Loro'],2);
      $subtornillojamba = number_format($Tornillojamba * $precios['Tornillos por Jamba'],2);
      $subtornillofijar = number_format($Tornillofijar * $precios['Tornillos para fijar'],2);
      $subtornillohoja = number_format($Tornillohoja * $precios['Tornillos 6x3/8 para hoja'],2);
      $subtornilloempotre = number_format($Tornilloempotre * $precios['Tornillos para empotre'],2);
      $subramplu = number_format($Tornilloempotre * $precios['Ramplu'],2);
      
      $detalles[] = [
        'subtornillohoja' => $subtornillohoja,
        'subramplu' => $subramplu,
        'subrodamientos' => $subrodamientos,
        'subburlet' => $subburlet,
        'subfelpa' => $subfelpa,
        'subpicoloro' => $subpicoloro,
        'subtornillojamba' => $subtornillojamba,
        'subtornillofijar' => $subtornillofijar,
        'subtornilloempotre' => $subtornilloempotre,
        'subsilicona' => $subsilicona,
        'subvidrio' => $subvidrio,
        'precio_color' => $precioPorColor,
        'subunion' => $subunion,
        'subzocalo' => $subzocalo,
        'subgancho' => $subgancho,
        'subparante' => $subparante,
        'subjamba' => $subjamba,
        'subrielinferior' => $subrielinferior,
        'subrielsuperior' => $subrielsuperior,
        'Crielinferior' => $Crielinferior,
        'Tornillojamba' => $Tornillojamba,
        'Cjamba' => $Cjamba,
        'Cparante' => $Cparante,
        'Cgancho' => $Cgancho,
        'Czocalo' => $Czocalo,
        'Chojaunion' => $Chojaunion,
        'Crielsuperior' => $Crielsuperior,
        'altura' => $altura,
        'ancho' => $ancho,
        'hoja' => $hoja,
        'color' => $color,
        'cantidad' => $cantidad,
        'rielSuperior' => $rielSuperior,
        'rielInferior' => $rielInferior,
        'jamba' => $jamba,
        'jambaTotal' => $jambaTotal,
        'parante' => $parante,
        'gancho' => $gancho,
        'paranteTotal' => $paranteTotal,
        'ganchoTotal' => $ganchoTotal,
        'zocalo' => $zocalo,
        'silicona' => $silicona,
        'hojaunion' => $hojaunion,
        'pza' => $pza,
        'zocaloTotal' => $zocaloTotal,
        'totalLineal' => $totalLineal,
        'cantidadBarras' => $cantidadBarras,
        'altoVidrio' => $altoVidrio,
        'anchoVidrio' => $anchoVidrio,
        'areaVidrio' => $areaVidrio,
        'Burlet' => $Burlet,
        'Felpa' => $Felpa,
        'Rodamientos' => $Rodamientos,
        'Picoloro' => $Picoloro,
        'Tornillohoja' => $Tornillohoja,
        'Tornillofijar' => $Tornillofijar,
        'Tornilloempotre' => $Tornilloempotre,
      ];

    }
    
    

    // Datos para la vista blade
    $data = [
      'nombre' => $nombre,
      'celular' => $celular,
      'lineaVentana' => $lineaVentana,
      'detalles' => $detalles,
      'precios' => $precios,
    ];

    // Configurar el tamaño del PDF a carta (8.5 x 11 pulgadas)
    $pdf = PDF::loadView('ventana-20-25.pdf', $data)->setPaper('letter', 'portrait');

    // Descargar el PDF
    return $pdf->stream('ventana.pdf');
  }


  public function actualizarPrecio(Ventana $ventana, Request $request)
  {
    $ventana->costo_unitario = $request->input('costo_unitario');
    $ventana->save();
    return redirect()->route('ventanas.precios')->with('success', 'Precio actualizado correctamente.');
  }

  public function index()
  {
    return view('ventana-20-25.index');
  }
  public function precios()
  {
    $ventanas = Ventana::all();
    return view('ventana-20-25.precios', compact('ventanas'));
  }
  public function show($id)
  {
    // Lógica para mostrar un recurso específico
  }
}
