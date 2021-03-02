@extends('layouts._layout')
@section('title','Documentos Publicados')

@section('contenido')
    <div class="formulario-center">
        <div class="slider">
            <div class="container">
                <div style="background-color: rgba(255, 255, 255, 0.568);" class="card">
                    <div class="card-header">
                        <h4 class="card-subtitle mb-2">INFORMACION PUBLICADA</h4>
                    </div>
                        <div class="container-lg">
                            <!-- Inserlar lista para filtro :v y/o por cateogria-->
                        </div>
                        <table class="table table-hover table-bordered table-responsive table-striped">
                            <thead class="thead-dark">
                                <th>DOCUMENTO</th>
                                <th>CATEGORÍA</th>
                                <th>FECHA PUBLICACIÓN</th>
                                <th>RESUMEN</th>
                                <th colspan="2"></th>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $row)
                                    @if ($row->category->module == 2)
                                        <tr class="t">
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
                        {{ $documentos->render() }}
                </div>
            </div>
        </div>
    </div>

@endsection

