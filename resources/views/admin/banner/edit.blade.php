@extends('layouts.admin')
@section('title','Actualizando Banner')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('banners.index') }}">Banner's</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Actualizacion de Banner</h3>
        </div>
        {!! Form::model($carrusel,['route'=>['banners.update',$carrusel->id],'method'=>'PUT','files'=>true]) !!}
        <div class="card-body">
            @include('admin.banner.form.form')
        </div>
        <div class="card-footer">
            <a href="{{ route('banners.index') }}" class="btn btn-danger float-right">Regresar</a>
            <input type="submit" value="Actualizar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div> 
    
@endsection