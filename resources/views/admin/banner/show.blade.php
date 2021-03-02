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
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('banners.index') }}" class="btn btn-secondary btn-lg">Regresar</a>
    </div>

@endsection
