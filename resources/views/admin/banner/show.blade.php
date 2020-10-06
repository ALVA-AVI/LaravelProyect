@extends('layouts.admin')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
@endsection
@section('title','Vista Previa de Banner')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('banners.index') }}">Banner's</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <img src="{{ $carrusel->image->url }}" class="img-fluid" alt="Responsive image" />
                        <div class="content-text">
                            <div class="item-text">
                                <h2>{{ $carrusel->titulo }}</h2>
                                <p>{{ $carrusel->resena }}</p>
                                <?php $carrusel->linkref != ""? $link = explode('-',$carrusel->linkref):"";?>
                                @if ($link !="" || $link != null)
                                <a class="btn btn-secondary btn-sm float-right" href="{{ $link[0] }}">{{ $link[1] }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>                            
        </div>
        <a href="{{ route('banners.index') }}" class="btn btn-secondary btn-lg">Regresar</a>
    </div> 
    
@endsection