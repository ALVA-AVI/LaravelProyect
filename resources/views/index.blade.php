@extends('layouts._layout')

@section('banner')
<div class="banner-slider">
    @include('layouts.partials._banner')
</div>
@endsection
@section('contenido')
<main class="home-contenido">
 <div class="row">
    <div class="col-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-auto">
                    <div class="container">
                        {{-- dd($noticia) --}}
                        @if ($noticia != "" || $noticia != null)
                        <h2 class="card-subtitle mb-2">Últimas Noticias</h4>
                        @if (($noticia->image->url != "" || $noticia->image->url != null))
                        <div class="card">
                            <div class="cont-n-img">
                                <img width="619" height="347" src="{{ asset($noticia->image->url) }}" class="img-fluid attachment-easthill-featured size-easthill-featured wp-post-image" alt="" sizes="(max-width: 619px) 100vw, 619px" />
                            </div>
                            <div class="card-footer">
                                {{-- <span class="cat-link">
                                    <a class="category" href="#">{{ $noticia->category->name }}</a>
                                </span> --}}
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                    <a href="{{ route('web.index') }}" rel="bookmark">{!! htmlspecialchars_decode($noticia->titulo) !!}</a>
                                    </h2>
                                    <div class="entry-meta">
                                        <span class="posted-on">
                                            <i class="fa fa-calendar"></i>
                                            <time class="entry-date published" datetime="2017-05-12T11:55:40+00:00">
                                                publicado el  {{ date("d/m/yy",strtotime($noticia->fecha)) }}
                                            </time>
                                        </span>
                                        <span class="byline">
                                            <i class="fa fa-user"></i>
                                            <span class="author vcard">
                                                <a class="url fn n" href="#">Admin</a>
                                            </span>
                                        </span>
                                    </div>
                                </header>
                                <div class="entry-excerpt">
                                    <p>{!! htmlspecialchars_decode($noticia->resumen) !!}</p>
                                </div>
                                <div class="entry-footer">
                                    <a class="read-more" href="{{ route('web.show',$noticia->id) }}">Leer Mas...</a>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="card">
                                <div class="card-body">
                                    <header class="entry-header">
                                    <h2 class="entry-title">
                                    <a href="{{ route('web.index') }}" rel="bookmark">{!! htmlspecialchars_decode($noticia->titulo) !!}</a>
                                    </h2>
                                    <div class="entry-meta">
                                        <span class="posted-on">
                                            <i class="fa fa-calendar"></i>
                                            <time class="entry-date published" datetime="2017-05-12T11:55:40+00:00">
                                                publicado el  {{ date("d/m/yy",strtotime($noticia->fecha)) }}
                                            </time>
                                        </span>
                                        <span class="byline">
                                            <i class="fa fa-user"></i>
                                            <span class="author vcard">
                                                <a class="url fn n" href="#">Admin</a>
                                            </span>
                                        </span>
                                    </div>
                                </header>
                                <div class="entry-excerpt">
                                    <p>{!! htmlspecialchars_decode($noticia->contexto) !!}</p>
                                </div>
                                {{--<div class="entry-footer">
                                    <a class="read-more" href="{{ route('web.show',$noticia->id) }}">Leer Mas...</a>
                                </div>--}}
                                </div>
                            </div>
                        @endif
                        @endif
                </div>
                <hr>
                <div class="col-lg-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="historia-de-humberto-lay/index.html" rel="bookmark">Historia de Humberto Lay</a>
                                    </h2>
                                </header>
                            </div>
                            <div class="card-text">
                                <div class="entry-excerpt">
                                    <p>
                                        <a href="https://es.wikipedia.org/wiki/Humberto_Lay_Sun">Conocer más Humberto Lay</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <img width="600" height="300" class="img-fluid card-img-bottom" src="{{ asset('img/2017/04/foto_lay-1024x692.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <hr>
                <div class="col-lg-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-2 text-muted">Spot Humberto Lay</h4>
                        </div>
                        <iframe class="video-lay" src="https://www.youtube.com/embed/reLktb4Fb-U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-lg-auto">
        <ul class="princip-docs">
            <li>
                <a class="btn btn-primary btn-lg btn-block" target="_blank" href="{{ 'storage/docs/IDEARIO-PRINCIPIOS-VISION-PAIS-2020.pdf' }}"><b class="widget-title">Ideario</b></a></a>
            </li>
            <li>
                <a class="btn btn-info btn-lg btn-block" target="_blank" href="{{ 'storage/docs/PRICIPIOS_DOCTRINALES.pdf' }}"><b class="widget-title">Principios Doctrinales</b></a>
            </li>
        </ul>

        <div class="container">
            <div id="secondary" class="widget-area" role="complementary">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="form-group input-group">
                            {{ Form::label('Buscar :',null,array_merge(['class'=>'sr-only'])) }}
                            {{ Form::text('buscar',null,array_merge(['class'=>'form-control','placeholder'=>'Buscar...'])) }}
                            {{ Form::submit('Buscar',array_merge(['class'=>'input-group-append btn btn-primary'])) }}
                        </div>
                    </div>
                </div>
                <aside id="recent-posts-2" class="widget widget_recent_entries">
                    <h2 class="widget-title">Publicaciones recientes</h2>
                    <ul>
                        <li>
                            <a href="{{ route('web.index') }}">Noticias</a>
                        </li>
                        <li>
                            <a href="http://restauracionnacional.org.pe/historia-de-humberto-lay/">Historia de Humberto Lay</a>
                        </li>
                        <!--li>
                            <a target="_blank" href="{{ 'storage/docs/IDEARIO-PRINCIPIOS-VISION-PAIS-2020.pdf' }}">Ideario</a></a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ 'storage/docs/PRICIPIOS_DOCTRINALES.pdf' }}">Principios Doctrinales</a>
                        </li-->
                    </ul>
                </aside>
                <aside id="categories-2" class="widget widget_categories">
                    <h2 class="widget-title">Modulos</h2>
                    @include('layouts._categoria')
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
