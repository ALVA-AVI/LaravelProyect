@extends('layouts.admin')
@section('title','Crear Categoría')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('categories.index') }}">Categoría</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registro de Categoría</h3>
        </div>
        {!! Form::open(['route'=>'categories.store','method'=>'POST','files'=>true]) !!}
        <div class="card-body">
            @include('admin.categoria.form.form')
        </div>
        <div class="card-footer">
            <a href="{{ route('categories.index') }}" class="btn btn-danger float-right">Cancelar</a>
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div>    
@endsection