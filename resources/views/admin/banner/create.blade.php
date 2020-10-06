@extends('layouts.admin')
@section('title','Crear Banner')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('banners.index') }}">Banner's</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registro de Banner</h3>
        </div>
        {!! Form::open(['route'=>'banners.store','method'=>'POST','files'=>true]) !!}
        <div class="card-body">
            @include('admin.banner.form.form')
        </div>
        <div class="card-footer">
            <a href="{{ route('banners.index') }}" class="btn btn-danger float-right">Cancelar</a>
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div> 
    
@endsection