@extends('adminlte::page')

@section('title', 'Menú de Precios')

@section('content')
    <h1>Menú de Costos </h1>
    <div class="row">
        <div class="col-md-6">


            
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Materiales</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Costo Unitario Linea 20 (Bs.-)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($ventanas->where('tipo', 'Material') as $ventana)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $ventana->nombre }}</td>
                                    <td>
                                        <form action="{{ route('ventanas.actualizar.precio', $ventana) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="costo_unitario" class="form-control form-control-sm" value="{{ $ventana->costo_unitario }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                
                                <!-- Inserta la nueva fila después de la séptima fila -->
                                @if ($i == 8)
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Costo Unitario Linea 25 (Bs.-)</th>
                                    </tr>
                                </thead>
                                @endif
                                
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
            


        </div>
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Accesorios</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Costo Unitario Linea 20 (Bs.-)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($ventanas->where('tipo', 'Accesorio') as $ventana)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $ventana->nombre }}</td>
                                    <td>
                                        <form action="{{ route('ventanas.actualizar.precio', $ventana) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="costo_unitario" class="form-control form-control-sm" value="{{ $ventana->costo_unitario }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                                               <!-- Inserta la nueva fila después de la séptima fila -->
                                                               @if ($i == 11)
                                                               <thead>
                                                                   <tr>
                                                                       <th>#</th>
                                                                       <th>Nombre</th>
                                                                       <th>Costo Unitario Linea 25 (Bs.-)</th>
                                                                   </tr>
                                                               </thead>
                                                               @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Vidrios</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Costo Unitario (Bs.-)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($ventanas->where('tipo', 'Vidrio') as $ventana)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{  $ventana->nombre }}</td>
                                    <td>
                                        <form action="{{ route('ventanas.actualizar.precio',  $ventana) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="costo_unitario" class="form-control form-control-sm" value="{{  $ventana->costo_unitario }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Mano de Obra</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Costo lineal (Bs/m2)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($ventanas->where('tipo', 'Mano de Obra') as $ventana)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $ventana->nombre }}</td>
                                    <td>
                                        <form action="{{ route('ventanas.actualizar.precio', $ventana) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="costo_unitario" class="form-control form-control-sm" value="{{ $ventana->costo_unitario }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop