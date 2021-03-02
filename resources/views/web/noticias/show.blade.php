@extends('layouts._layout')
@section('title','Restauracion Nacional')
    
@section('contenido')
    <div class="formulario-center">
        <div class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-9">
                        @if ($noticia->image->url != "" || $noticia->image->url != null)
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-muted">
                                        {!! htmlspecialchars_decode($noticia->titulo) !!}
                                    </h5>
                                </div>
                                @if ($noticia->contexto != "" || $noticia->contexto != null)
                                    <div class="card-body">
                                        <img src="{{ $noticia->image->url }}" width="250" height="150" class="photo-notice">
                                        <div class="h4 text-muted">
                                            {{ $noticia->resumen }}
                                        </div>
                                        <p>
                                            {!! htmlspecialchars_decode($noticia->contexto) !!}
                                        </p>
                                        @if ($noticia->archivo != "" || $noticia->archivo != null)
                                        <fieldset class="group-info">
                                            <legend class="title-info">Información Adjunta:</legend>
                                            <a target="_blanck" href="{{ asset('storage/'.$noticia->archivo) }}" class="btn btn-info"><i class="fa fa-eye"></i> Revisar Información</a>
                                        </fieldset>
                                        @endif
                                    </div>
                                @else 
                                    <div class="card-body">
                                        <img src="{{ $noticia->image->url }}" alt="" class="img-fluid">
                                        <br><br>
                                        <div class="h4 text-muted">
                                            {{ $noticia->resumen }}
                                        </div>
                                        <br>
                                        @if ($noticia->archivo != "" || $noticia->archivo != null)
                                        <fieldset class="group-info">
                                            <legend class="title-info">Información Adjunta:</legend>
                                            <a target="_blanck" href="{{ asset('storage/'.$noticia->archivo) }}" class="btn btn-info"><i class="fa fa-eye"></i> Revisar Información</a>
                                        </fieldset>
                                        @endif
                                    </div>
                                @endif
                                <div class="card-footer">
                                    <div class="lead">
                                        <p> publicado el {{ date("d - m - yy",strtotime($noticia->fecha)) }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            salir   
                        @endif
                    </div>
                    <div class="col col-lg-3">
                        <div class="card">
                                @include('web.weblayouts._categorias')
                        </div>
                        <hr>
                        <h5>Mas Publicaciones</h5>
                        <div class="overflow-hidden">
                            @include('web.weblayouts._plusnoticias')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection