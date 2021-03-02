@extends('layouts._layout')
@section('title', 'Noticias')
   
@section('contenido')
<main class="formulario-center">
    <div class="slider">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-9">
                    @foreach ($noticias as $item)
                        @if(($item->image->url != "" || $item->image->url != null))
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-2">
                                        {!! htmlspecialchars_decode($item->titulo) !!}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @if ($item->contexto != "" || $item->contexto != null)
                                        <div class="row">
                                            <div class="col">
                                                <img src="{{ $item->image->url }}" alt="" width="250" height="150" class="photo-notice">
                                                <div class="h4 text-muted">
                                                    {!! htmlspecialchars_decode($item->resumen) !!}
                                                </div>
                                                <p>
                                                    {!! htmlspecialchars_decode($item->contexto) !!}
                                                </p>
                                            </div>
                                        </div>
                                        @if ($item->archivo != "" || $item->archivo != null)
                                        <fieldset class="group-info">
                                            <legend class="title-info">Información Adjunta:</legend>
                                            <a target="_blanck" href="{{ asset('storage/'.$item->archivo) }}" class="btn btn-info"><i class="fa fa-eye"></i> Revisar Información</a>
                                        </fieldset>
                                        @endif
                                    @else
                                        <img src="{{ $item->image->url }}" class="img-fluid">
                                        <hr>
                                        <div class="h6">
                                            {{ $item->resumen }}
                                        </div>
                                        @if ($item->archivo != "" || $item->archivo != null)
                                        <fieldset class="group-info">
                                            <legend class="title-info">Información Adjunta:</legend>
                                            <a target="_blanck" href="{{ asset('storage/'.$item->archivo) }}" class="btn btn-info"><i class="fa fa-eye"></i> Revisar Información</a>
                                        </fieldset>
                                        @endif
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <div class="lead">
                                        <p> publicado el {{ date("d - m - yy",strtotime($item->fecha)) }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $item->titulo }}</h3>
                                </div>
                                <div class="card-body">
                                    @if ($item->contexto != "" || $item->contexto != null)
                                        {!! htmlspecialchars_decode($item->contexto) !!}
                                    @else
                                       <div class="h4 text-muted"> {!! htmlspecialchars_decode($item->resumen) !!}</div>
                                    @endif
                                    @if ($item->archivo != "" || $item->archivo != null)
                                        <fieldset class="group-info">
                                            <legend class="title-info">Información Adjunta:</legend>
                                            <a target="_blanck" href="{{ asset('storage/'.$item->archivo) }}" class="btn btn-info"><i class="fa fa-eye"></i> Revisar Información</a>
                                        </fieldset>
                                    @endif
                                </div>
                            </div>
                            <hr>
                        @endif
                        <br>
                    @endforeach    
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
</main>
@endsection