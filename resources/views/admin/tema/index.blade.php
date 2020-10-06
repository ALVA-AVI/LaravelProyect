@extends('layouts.admin')
@section('title','Temas Consultas')
@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2 text-muted">Admision de Temas de Consulta</h4>
                        <div class="card-tools">
                            <a href="{{ route('temas.create') }}" class="btn btn-tool">
                                <h6> Agregar <i class="fas fa-plus"></i></h6>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tema</th>
                                    <th colspan="2">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($temas as $tema)
                                    <tr>
                                        <td>{{ $tema->id }}</td>
                                        <td>{{ $tema->name }}</td>
                                        <td width=15px><a href="{{ route('temas.edit',$tema->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a></td>
                                        <td width=15px><a href="{{ route('temas.destroy',$tema->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $temas->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection