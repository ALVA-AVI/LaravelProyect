@extends('layouts.admin')
@section('title')
    @if (request()->routeIs('temas.create'))
        Crear Temas Consulta
    @else 
        Actualizacion Tema de Consulta
    @endif
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('temas.index') }}">Temas Consulta</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2 text-muted">
                            @if (request()->routeIs('temas.create'))
                                Registro Temas de Consulta @else Editando de Tema de Consulta
                            @endif
                        </h4>
                    </div>
                        @if (request()->routeIs('temas.create'))
                            {!! Form::open(['route'=>'temas.store','method'=>'POST','files'=>true]) !!}
                            <div class="card-body">
                                @include('admin.tema.form.form')
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('temas.index') }}" class="btn btn-danger float-right">Cancelar</a>
                                <input type="submit" value="Guardar" class="btn btn-primary">
                            </div>
                            {!!  Form::close() !!}
                        @else
                            {!! Form::model($tema,['route'=>['temas.update',$tema->id],'method'=>'PUT','files'=>true]) !!}
                            <div class="card-body">
                                @include('admin.tema.form.form')
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('temas.index') }}" class="btn btn-danger float-right">Cancelar</a>
                                <input type="submit" value="Actualizar" class="btn btn-primary">
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection