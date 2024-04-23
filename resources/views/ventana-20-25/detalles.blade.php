@extends('adminlte::page')
@section('title', 'Formulario de Detalles')

@section('content_header')
    <h1 class="m-0">DESCRIPCIÓN DE LOS DETALLES DE CADA SERVICIO</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Actualización de Detalles de Servicios</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('actualizarDescripcion') }}">
                @csrf

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 20%;">Nombre del Servicio</th>
                                <th>Detalle del Servicio</th>
                                <th style="width: 15%;">Actualizar Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cotizaciones as $cotizacione)
                                <tr>
                                    <td>{{ $cotizacione->id_servicio }}</td>
                                    <td>{{ $cotizacione->servicio }}</td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="10" name="description[]">{{ $cotizacione->descripcion_del_servicio }}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" name="record_id[]" value="{{ $cotizacione->id_servicio }}">
                                        <button class="btn btn-sm btn-danger" type="submit">Actualizar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection
