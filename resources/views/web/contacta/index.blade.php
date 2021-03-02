@extends('layouts._layout')
@section('title','Contactanos')
@section('contenido')
<main class="formulario-center">
    <div class="slider">
        <div class="container">
            @if (session('info'))
                <div class="alert alert-success alert-dismissible fade show" id="alerta" role="alert" >
                {{session('info')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5 class="alert alert-danger">Entremos en Contacto</h5>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            {!! Form::open(['route'=>'web.sendmail','method'=>'POST']) !!}
                                @include('web.contacta.form.form')
                            {!! Form::submit('Enviar', ['class'=>'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body">
                            @include('web.contacta.form.form1')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#alerta').fadeIn();     
            setTimeout(function() {
                $("#alerta").fadeOut();           
            },4000);
        });
    </script>
@endsection