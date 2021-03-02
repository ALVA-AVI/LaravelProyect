@extends('layouts.admin')
@section('title','Candidatos')
@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-2 text-muted">Admision de Candidatos</h4>
        <div class="card-tools">
            <a href="{{ route('candidatos.create') }}" class="btn btn-tool">
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
                @foreach ($candidatos as $candidato)
                    <tr>
                        <td>{{ $candidato->id }}</td>
                        <td>{{ $candidato->titulo }}</td>
                        <td>{{ $candidato->departament_id}}</td>
                        <!--td>{{-- $candidato->province_id --}}</td-->
                        <!--td>{{-- $candidato->district_id --}}</td-->
                        <td>{{ $candidato->fecha }}</td>
                        <td>{{ $candidato->descripcion }}</td>
                        {{-- <td><ahref=""class="btnbtn-warningbtn-smfloat-right"><iclass="fafa-eye"></i></a></td> --}}
                        <td width="15px"><a href="{{ route('candidatos.edit',$candidato->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a></td>
                        <td width="15px">
                            {!! Form::open(['route'=>['candidatos.destroy',$candidato->id],'method'=>'DELETE']) !!}
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $candidatos->render() }}
    </div>
    <div class="card-footer">
        <div class="float-right">Total de candidatos <strong> {{ count($candidatos) }}</strong></div>
    </div>
</div>
@endsection
