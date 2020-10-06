@extends('layouts._layout');
@section('title','Afiliados')

@section('contenido')
    <div class="formulario-center">
        <div class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-subtitle mb-2 text-muted">
                                    Orientacion para ver lista de registrados
                                </h3>
                                <hr>
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-primary">
                                        <p class="afil-link">Acceder a la página de <a class="link-ref" target="_blank" href="https://aplicaciones007.jne.gob.pe/srop_publico/Consulta/PadronAfiliado"><b>Registro de Organizaciones Pólitcas</b></a>.</p> 
                                    </li>
                                    <li class="list-group-item list-group-item-info">
                                        <p>Busca en la lista el partido politico <a class="link-ref" href=""><b>RESTAURACION NACIONAL</b></a>  con el siguiente logo:</p>
                                        <img class="rounded" src="{{ asset('img/2017/04/cropped-LOGO-192x192.png') }}" alt="" srcset="">
                                    </li>
                                    <li class="list-group-item list-group-item-success">
                                        <p class="txt-info"> Accede al consultar. <a target="_blank" class="link-ref" href="https://aplicaciones007.jne.gob.pe/srop_publico/Consulta/PadronAfiliado"><h4 class="txt-info">aqui <i class="fa fa-angle-double-right"></i></h4></a></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
