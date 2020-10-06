@extends('layouts._layout')
@section('title','Documento')

@section('contenido')
    <div class="formulario-center">
        <div class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">{{ $file->titulo }}</h4>
                            </div>
                            <div class="card-body">
                                {!! htmlspecialchars_decode($file->contexto)!!}
                            </div>
                            <div class="card-footer">
                                <p>publicado  el {{ date("d - m - yy",strtotime($file->fecha)) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body widget-area">
                                <aside class="widget widget_recent_entries">
                                <h4 class="widget-title">Descargar Aqui</h4>
                                @if ($file->archivo != "" || $file->archivo != null)
                                    <ul>
                                        <li>
                                            <a href="{{asset($file->archivo)}}">Descargar Archivo</a>
                                        </li>
                                    </ul>
                                @endif
                                </aside>
                                <aside class="widget widget_recent_entries">
                                    <h5>Mas Publicaciones</h5>
                                    <div class="overflow-hidden">
                                        @include('web.weblayouts._documento')
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

