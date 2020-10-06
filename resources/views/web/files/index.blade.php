@extends('layouts._layout')
@section('title','Documentos Publicados')

@section('contenido')
    <div class="formulario-center">
        <div class="slider">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-subtitle mb-2 text-muted">Documentos Publicados</h4>
                    </div>
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <th>Documento</th>
                                <th>Categoría</th>
                                <th>Fecha Publicación</th>
                                <th>Resumen</th>
                                <th colspan="2"></th>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $row)
                                    @if ($row->category->module == 2)
                                        <tr>
                                            <td>{{ $row->titulo }}</td>
                                            <td>{{ $row->category->name }}</td>
                                            <td>{{ date("d F, yy",strtotime($row->fecha)) }}</td>
                                            <td>{{ $row->resumen }}</td>
                                            <td><a target="_blank" href="{{ asset('storage/'.$row->archivo) }}" class="btn btn-secondary btn-sm left-right">Descargar <i class="fa fa-download"></i></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection

