@extends('layouts.admin')
@section('title','Registrar Comite')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('comites.index') }}">Comites</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    @if (request()->routeIs('comites.create'))
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-2 text-muted">Registro de Comite</h3>
        </div>
        {!! Form::open(['route'=>'comites.store','method'=>'POST','files'=>true]) !!}
        <div class="card-body">
            @include('admin.comite.form.form')
        </div>
        <div class="card-footer">
            <a href="{{ route('comites.index') }}" class="btn btn-danger float-right">Cancelar</a>
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div>
    @else
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-2 text-muted">Registro de Comite</h3>
        </div>
        {!! Form::model($comite,['route'=>['comites.update',$comite->id],'method'=>'PUT','files'=>true]) !!}
            <div class="card-body">
                @include('admin.comite.form.form')
            </div>
            <div class="card-footer">
                <a href="{{ route('comites.index') }}" class="btn btn-danger float-right">Cancelar</a>
                <input type="submit" value="Actualizar" class="btn btn-primary">
            </div>
        {!! Form::close() !!}
    </div>
    @endif    
@endsection

@section('scripts')

<script>
    function validarDocumento(){
        var archivoInput = document.getElementById('archivo');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.pdf|.PDF)$/i;
        if(!extPermitidas.exec(archivoRuta)){
            alert('Asegurate de haber seleccionado un Documento PDF');
            archivoInput.value = '';
            return false;
        }else{
            if(archivoInput.files && archivoInput.files[0]){
                var visor = new FileReader();
                visor.onload = function(e){
                    document.getElementById('visorPdf').innerHTML='<embed src="'+e.target.result+'" width="500" height="300">';
                };
                visor.readAsDataURL(archivoInput.files[0]);
            }
        }
    }
</script>
    
@endsection