@extends('layouts.admin')
@section('title','Detalles Publicación')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('registros.index') }}">Publicaciones</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles de Publicaciones</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <!--Title-->
                    <h1 class="mt-4">{{ $registro->titulo }}</h1>
                    <!--Time-->
                    <div class="lead">
                        <p> publicado el {{ date("d - m - yy",strtotime($registro->fecha)) }}</p>
                    </div>
                    @if ($registro->image->url != "")
                    <hr>
                        <p class="card-subtitle mb-2 text-muted">
                            {{ $registro->resumen }}
                        </p>
                    <hr>
                    <!--Vista Previa de Imagen -->
                   <a href="{{ $registro->image->url }}"> <img src="{{ $registro->image->url }}" alt="" class="img-fluid-rounded"></a>
                    @endif
                    <hr>
                    <p class="lead">
                        {!! htmlspecialchars_decode($registro->contexto) !!}
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="card-my-4">
                        <h5 class="card-header">Archivos PDF</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        @if ($registro->archivo != "")
                                        <li><a href="{{ asset('storage/'.$registro->archivo) }}"> Documentos </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('registros.index') }}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
@endsection
