@extends('layouts.admin')
@section('title','Géstion de Publicaciones')
@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sección de Publicaciones</h3>
            <div class="card-tools">
                <a href="{{ route('registros.create') }}" class="btn btn-tool">
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
            <table class="table table-head-fixed table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th>Titulo</th>
                        <th>Modulo</th>
                        <th>resumen</th>
                        <th>Fecha</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td scope="row">{{ $registro->id }}</td>
                            <td>{{ $registro->titulo }}</td>
                            <td>
                                @foreach (getModulesArray() as $row => $value)
                                @if ($row == $registro->category->module)
                                    {{ $value }}
                                @endif
                            @endforeach</td>
                            <td>{{ $registro->resumen }}</td>
                            <td>{{ date("d/m/yy",strtotime($registro->fecha)) }}</td>
                            <td width="30">
                                <a href="{{ route('registros.edit',$registro->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            </td>
                            <td width="30">
                                <a href="{{ route('registros.show',$registro->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                            </td>
                            <td width="30">
                                {!! Form::open(['route'=>['registros.destroy',$registro->id],'method'=>'DELETE']) !!}
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $registros->render()}}
        </div>
        <div class="card-footer">
            footer
            <strong class="float-right">Total {{ count($registros) }}</strong>
        </div>
    </div>
@endsection