@extends('layouts._layout')
@section('title', 'Noticias')
   
@section('contenido')
<main class="formulario-center">
    <div class="slider">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-9">
                   @foreach ($noticias as $item)
                   @if (($item->image->url != "" || $item->image->url != null) && $item->category->module == 1)
                   <div class="card">
                       <div class="card-header">
                           <h4 class="card-title">{!! htmlspecialchars_decode($item->titulo) !!}</h4>
                       </div>
                       <div class="card-body">
                           <div class="row">
                               <div class="col-lg-6">
                                   <img src="{{ $item->image->url }}" class="card-img-top" alt="">
                                   <hr>
                                   {{ $item->resumen }}
                                   <hr>
                                   <!--p class="lead">
                                       Archivos
                                   </p>
                                   <ul class="list-group list-group-horizontal-md">
                                       <li class="list-group-item"><a href="">Documento</a></li>
                                       <li class="list-group-item"><a href="">Imagen</a></li>
                                     </ul-->
                               </div>
                               <div class="col-lg-6">
                                   {!! htmlspecialchars_decode($item->contexto) !!}
                               </div>
                               
                           </div>
                       </div>
                       <div class="card-footer">
                           <div class="lead">
                               <p> publicado el {{ date("d - m - yy",strtotime($item->fecha)) }}</p>
                           </div>
                       </div>
                   </div>
                   <hr>
                   @endif
                   @endforeach    

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
</main>
@endsection