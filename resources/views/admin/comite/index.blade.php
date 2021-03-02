@extends('layouts.admin')
@section('title','Comites')
@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-2 text-muted">Admision de Comites</h4>
        <div class="card-tools">
            <a href="{{ route('comites.create') }}" class="btn btn-tool">
                <h6> Agregar <i class="fas fa-plus"></i></h6>
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Zona</th>
                    <th>Fecha</th>
                    <th>Resumen</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comites as $comite)
                    <tr>
                        <td>{{ $comite->id }}</td>
                        <td>{{ $comite->titulo }}</td>
                        <td>{{ $comite->departament_id}}</td>
                        <!--td>{{-- $comite->province_id --}}</td-->
                        <!--td>{{-- $comite->district_id --}}</td-->
                        <td>{{ $comite->fecha }}</td>
                        <td>{{ $comite->descripcion }}</td>
                        {{-- <td><ahref=""class="btnbtn-warningbtn-smfloat-right"><iclass="fafa-eye"></i></a></td> --}}
                        <td width="15px"><a href="{{ route('comites.edit',$comite->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a></td>
                        <td width="15px">
                            {!! Form::open(['route'=>['comites.destroy',$comite->id],'method'=>'DELETE']) !!}
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            {!! Form::close() !!}    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $comites->render() }}
    </div>
    <div class="card-footer">
        <div class="float-right">Total de comites <strong> {{ count($comites) }}</strong></div>
    </div>
</div>
@endsection