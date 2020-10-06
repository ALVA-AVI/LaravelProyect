@extends('layouts.admin')
@section('title','Registro de Banners')
    
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sección de Publicación de Banner´s</h3>
        <div class="card-tools">
            <a href="{{ route('banners.create') }}" class="btn btn-tool">
                <h6> Agregar <i class="fas fa-plus"></i></h6>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive p-0" style="height: 300px">
        <table class="table table-head-fixed table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Reseña</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carrusel as $banner)
                    <tr>
                        <td scope="row">{{ $banner->id }}</td>
                        <td>{{ $banner->titulo }}</td>
                        <td>{{ $banner->category->name }}</td>
                        <td>{{ $banner->resena }}</td>
                        <td>
                            <a href="{{ route('banners.edit',$banner->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('banners.show',$banner->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['banners.destroy',$banner->id],'method'=>'DELETE']) !!}
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $carrusel->render()}}
    </div>
    <div class="card-footer">
        footer
    </div>
</div>
@endsection