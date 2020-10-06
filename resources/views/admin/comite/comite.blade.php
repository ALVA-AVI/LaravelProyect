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

            </div>
        {!! Form::close() !!}
    </div>
    @endif    
@endsection

@section('scripts')

<script>
    $(document).ready(function(e){
        $('#departament_id').on('change',function(e){
            var departament_id = $(this).val();
            if($.trim(departament_id) != ''){
                $.ajax({
                    url:'{{ route("provincias") }}',
                    type: 'GET',
                    dataType:'json',
                    data:{"id":departament_id},
                    success:function (data) {
                        $('#province_id').empty();
                        $('#province_id').append("<option value = ''>Seleccione una Procincia</option>");
                        $.each(data, function (index, value) {
                            $('#province_id').append("<option value='" + index + "'>" + value + "</option>");
                        }); 
                    },
                });
            } 
        });
        $('#province_id').on('change',function(e){
            var model = {
                "province_id":$(this).val() < 1000 ? "0"+$(this).val() : $(this).val(),
                "departament_id":$('#departament_id').val() < 10 ? "0"+$('#departament_id').val() : $('#departament_id').val()
            };
            console.log(model);
            
            if($.trim(province_id) != ''){
                $.ajax({
                    url:'{{ route("distritos") }}',
                    type: 'GET',
                    dataType:'json',
                    data: model,
                    success:function (data) {
                        $('#district_id').empty();
                        $('#district_id').append("<option value = ''>Seleccione un Distrito</option>");
                        $.each(data, function (index, value) {
                            $('#district_id').append("<option value='" + index + "'>" + value + "</option>");
                        }); 
                    },
                });
            } 
        });

    });
</script>
    
@endsection