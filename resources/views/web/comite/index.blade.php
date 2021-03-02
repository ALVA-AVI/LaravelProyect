@extends('layouts._layout')
@section('title', 'Comites')
   
@section('contenido')
<main class="formulario-center">
    <div class="slider">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-2 text-muted">INFORMACIÓN DE PRE-CANDIDATOS ELECCIONES 2021</h5>
            </div>
            <table class="table table-hover table-bordered table-responsive table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ZONA</th>
                        <!--th>REGION</th-->
                        <th>TÍTULO</th>
                        <th>RESEÑA</th>
                        <th>FECHA DE PUBLICACIÓN</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comites as $comite)
                        <tr>
                            <td>{{ $comite->departament_id}}</td>
                            <td>{{ $comite->titulo }}</td>
                            <td>{{ $comite->descripcion}}</td>
                            <td>{{ date("d - m - yy",strtotime($comite->fecha)) }}</td>
                            <td><a target="_blank" href="{{ asset('storage/'.$comite->archivo)}}" class="btn btn-primary btn-sm">Descargar PDF <i class="fa fa-download"></i></a></td>
                        </tr>
                    @endforeach
            </table>
                <div class="card-footer">
                    {{ $comites->render()}}
                <div class="float-right"><strong>Total {{count($comites)}}</strong></div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection