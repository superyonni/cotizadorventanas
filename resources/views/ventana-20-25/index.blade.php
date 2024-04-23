@extends('adminlte::page')
@section('title', 'Ludeño')
@section('content')
<div class="col-sm-6">
  <h4 class="m-0">Cotización Preliminar de Ventanas Corredizas</h4>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
   
          <div class="card-body">
            <form id="cotizacion-form" action="{{ route('ventanas.pdf') }}" method="POST" target="_blank">
                <div class="card-header">
                    <h3 class="card-title">
                      Línea de la Ventana:
                      <select id="lineaVentana" name="lineaVentana">
                        <option value="20">20</option>
                        <option value="25">25</option>
                      </select>
                    </h3>
                  </div>
              @csrf
              <button type="button" class="btn btn-primary" id="agregar-campos">Agregar más campos</button>
              <button type="submit" class="btn btn-success float-right mr-2">Generar PDF</button>
              <table id="tablaVentanas" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Dimensiones<br>Alto (m)</th>
                    <th>Dimensiones<br>Ancho (m)</th>
                    <th>Nro. Hojas</th>
                    <th>Color de Vidrios</th>
                    <th>Cant.</th>
                    <th>Área (m2)</th>
                    <th>Subtotal (Bs)</th>
                  </tr>
                </thead>
                <tbody id="campos-dimensiones">
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="number" step="0.01" class="form-control" id="alto_1" name="alto[]" oninput="limitarNumero(this, 10)">
                    </td>
                    <td>
                      <input type="number" step="0.01" class="form-control" id="ancho_1" name="ancho[]" oninput="limitarNumero(this, 10)">
                    </td>
                    
                    <td>
                      <select class="form-control" id="hojas_1" name="hojas[]" >
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-control" id="color_1" name="color[]" >
                        <option value="Incoloro">Incoloro</option>
                        <option value="Bronce Normal">Bronce Normal</option>
                        <option value="Bronce Reflectivo">Bronce Reflectivo</option>
                        <option value="Gris Normal">Gris Normal</option>
                        <option value="Gris Reflectivo">Gris Reflectivo</option>
                      </select>
                    </td>
                    <td>
                      <input type="number" class="form-control" id="cantidad_1" name="cantidad[]" >
                    </td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script src="{{ asset('js/ventanas.js') }}"></script>
@stop
