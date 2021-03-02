@extends('layouts._layout')
@section('title', 'Candidatos')

@section('contenido')
<main class="formulario-center">
    <div class="slider">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-2 text-muted">INFORMACIÓN DE CANDIDATOS ELECCIONES 2021</h5>
            </div>
                <table class="table table-hover table-bordered table-responsive table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ZONA</th>
                            <!--th>REGION</th-->
                            <th>TITULO</th>
                            <th>RESEÑA</th>
                            <th>FECHA DE PUBLICACIÓN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidatos as $candidato)
                            <tr>
                                <td>{{ $candidato->departament_id }}</td>
                                <td>{{ $candidato->titulo }}</td>
                                <td>{{ $candidato->descripcion}}</td>
                                <td>{{ date("d - m - yy",strtotime($candidato->fecha)) }}</td>
                                <td><a target="_blank" href="{{ asset('storage/'.$candidato->archivo)}}" class="btn btn-primary btn-sm">Descargar PDF <i class="fa fa-download"></i></a></td>
                            </tr>
                        @endforeach
                </table>
                <div class="card-footer">
                    {{ $candidatos->render()}}
                    <div class="float-right"><strong>Total {{count($candidatos)}}</strong></div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
