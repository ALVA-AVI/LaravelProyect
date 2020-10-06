@extends('layouts.admin')
@section('title','Editar Publicación')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('registros.index') }}">Publicaciones</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        
        <div class="card-header">
            <h3 class="card-title">Edición de Publicaciones</h3>
            @if ($registro == "")
            <div class="label-text">{{ $info }}</div>
            @endif
        </div>
        {!! Form::model($registro,['route'=>['registros.update',$registro->id],'method'=>'PUT','files'=>true]) !!}
        <div class="card-body">
            @include('admin.registro.form.form')
        </div>
        <div class="card-footer">
            <a href="{{ route('registros.index') }}" class="btn btn-danger float-right">Cancelar</a>
            <input type="submit" value="Actualizar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div>    
@endsection