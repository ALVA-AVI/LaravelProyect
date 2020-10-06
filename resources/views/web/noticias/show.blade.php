@extends('layouts._layout')
@section('title','Restauracion Nacional')
    
@section('contenido')
    <div class="formulario-center">
        <div class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-9">
                       @if ($noticia->image->url != "" || $noticia->image->url != null)
                       <div class="card">
                           <div class="card-header">
                               <h4 class="card-title">{!! htmlspecialchars_decode($noticia->titulo) !!}</h4>
                           </div>
                           <div class="card-body">
                               <div class="row">
                                   <div class="col-lg-6">
                                       <img src="{{ $noticia->image->url }}" class="card-img-top" alt="">
                                       <hr>
                                       {{ $noticia->resumen }}
                                       <hr>
                                       <!--p class="lead">
                                           Archivos
                                       </p>
                                       <ul class="list-group list-group-horizontal-md">
                                           <li class="list-group-noticia"><a href="">Documento</a></li>
                                           <li class="list-group-noticia"><a href="">Imagen</a></li>
                                         </ul-->
                                   </div>
                                   <div class="col-lg-6">
                                       {!! htmlspecialchars_decode($noticia->contexto) !!}
                                   </div>
                                   
                               </div>
                           </div>
                           <div class="card-footer">
                               <div class="lead">
                                   <p> publicado el {{ date("d - m - yy",strtotime($noticia->fecha)) }}</p>
                               </div>
                           </div>
                       </div>
                       @else
                               <div class="card">
                                   <div class="card-header">
                                        <h3 class="card-title">{{ $noticia->titulo }}</h3>
                                   </div>
                                   <div class="card-body">
                                       @if ($noticia->contexto != "" || $noticia->contexto != null)
                                           {!! htmlspecialchars_decode($noticia->contexto) !!}
                                        @else
                                            {!! htmlspecialchars_decode($noticia->resumen) !!}
                                       @endif
                                   </div>
                               </div>
                               <hr>
                       @endif
                    </div>
                    <div class="col col-lg-3">
                        <div class="card">
                                @include('web.weblayouts._categorias')
                        </div>
                        <hr>
                        <h5>Mas Publicaciones</h5>
                        <div class="overflow-hidden">
                            @include('web.weblayouts._plusnoticias')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection