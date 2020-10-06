@extends('layouts.admin')
@section('title','Crear Publicación')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('registros.index') }}">Publicaciones</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registro de Publicaciones</h3>
        </div>
        {!! Form::open(['route'=>'registros.store','method'=>'POST','files'=>true]) !!}
        <div class="card-body">
            @include('admin.registro.form.form')
        </div>
        <div class="card-footer">
            <a href="{{ route('registros.index') }}" class="btn btn-danger float-right">Cancelar</a>
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div> 
    
@endsection