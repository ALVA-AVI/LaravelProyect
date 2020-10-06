@extends('layouts.admin')
@section('title','Géstion de Categorías')
@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sección de categorias</h3>
            <div class="card-tools">
                <a href="{{ route('categories.create') }}" class="btn btn-tool">
                    <h6> Agregar <i class="fas fa-plus"></i></h6>
                </a>
                <!--button class="btn btn-tool" type="button" data-card-widget="collapse" data-toggle="tooltip" title="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button class="btn btn-tool" type="button" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i>
                </button-->
            </div>
        </div>
        <div class="card-body table-responsive p-0" style="height: 300px">
            <!--a href="{{ route('categories.create') }}" class="m-2 float-right btn btn-primary">Crear</a-->
            <ul class="nav nav-tabs">
                <li class="nav item">
                    <a href="{{ route('categories.index') }}" class="nav-link">Todos</a>
                </li>
                @foreach (getModulesArray() as $module => $item)
                    <li class="nav-item">
                        <a href="{{ route('module',$module) }}" class="nav-link">{{ $item }}</a>
                    </li>
                @endforeach
            </ul>
            <table class="table table-head-fixed table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th>Nombre</th>
                        <th>Modulo</th>
                        <!--th>Slug</th-->
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td scope="row">{{ $categoria->id }}</td>
                            <td>{{ $categoria->name }}</td>
                            <td>
                                @foreach (getModulesArray() as $row => $value)
                                    @if ($row == $categoria->module)
                                        {{ $value }}
                                    @endif
                                @endforeach
                            </td>
                            <!--td>{{ $categoria->slug }}</td-->
                            <td width="10px">
                                <a href="{{ route('categories.edit',$categoria->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                {!! Form::open(['route'=>['categories.destroy',$categoria->id],'method'=>'DELETE']) !!}
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categorias->render()}}
        </div>
        <div class="card-footer">
            footer
        </div>
    </div>
@endsection