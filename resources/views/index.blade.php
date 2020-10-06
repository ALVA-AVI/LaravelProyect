@extends('layouts._layout')

@section('contenido')
<main class="formulario-center">
    <!-- Open Carrusel -->
<div class="slider">
    <div class="container">
        {{-- dump(request()->routeIs('index')) --}}
        <div class="flexslider">
            @include('layouts.partials._banner')
        </div>
    </div>
</div>

<!-- End Carrusel ---->

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-xs-12">
            <div class="container">
                @if ($noticia != "" || $noticia != null)
                <h4 class="card-subtitle mb-2 text-muted">Últimas Noticias</h4>
                @if (($noticia->image->url != "" || $noticia->image->url != null) && $noticia->category->module = 1)
                <div class="cont-n-img">
                    <img width="619" height="347" src="{{ asset($noticia->image->url) }}" class="attachment-easthill-featured size-easthill-featured wp-post-image" alt="" sizes="(max-width: 619px) 100vw, 619px" />
                </div>
                <div class="text-holder">
                    <span class="cat-link">
                    <a class="category" href="category/sin-categoria/index.html">{{ $noticia->category->name }}</a>
                    </span>
                    <header class="entry-header">
                        <h2 class="entry-title">
                        <a href="{{ route('web.index') }}" rel="bookmark">{!! htmlspecialchars_decode($noticia->titulo) !!}</a>
                        </h2>
                        <div class="entry-meta">
                            <span class="posted-on">
                                <i class="fa fa-calendar"></i>
                                <a href="noticias/index.html" rel="bookmark">
                                <time class="entry-date published" datetime="2017-05-12T11:55:40+00:00">
                                    publicado el  {{ date("j  F, Y",strtotime($noticia->fecha)) }}
                                </time>
                                </a>
                            </span>
                            <span class="byline">
                                <i class="fa fa-user"></i>
                                <span class="author vcard">
                                    <a class="url fn n" href="author/admin/index.html">Admin</a>
                                </span>
                            </span>
                            <!--span class="comment">
                                <i class="fa fa-comment"></i>
                                <a href="noticias/index.html#respond">Leave a comment</a>
                            </span-->
                        </div>
                    </header>
                    <div class="entry-excerpt">
                    <p>{!! htmlspecialchars_decode($noticia->resumen) !!}</p>
                    </div>
                    <div class="entry-footer">
                        <a class="read-more" href="{{ route('web.show',$noticia->id) }}">Leer Mas...</a>
                    </div>
                </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <h5 class="subtitle md-4">No hay Noticias por el Momento</h5>
                        </div>
                    </div>
                @endif
                @endif
            </div>
            <br>
            <br>
            <br>
            <div class="container">
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
                    <img width="600" height="400" class="card-img-bottom" src="{{ asset('img/2017/04/foto_lay-1024x692.jpg') }}" alt="Card image cap">
                  </div>
            </div>
<br>
<br>
<br>

            <!--- Politica -->
            <div class="container">
                <div class="cont-n-img">
                    <a href="politica/index.html" class="post-thumbnail">
                        <img width="619" height="347" src="{{ asset('img/2017/04/cropped-PORTRAIT.jpg') }}" class="attachment-easthill-featured size-easthill-featured wp-post-image" alt="" sizes="(max-width: 750px) 100vw, 750px" />
                    </a>
                </div>
                <div class="text-holder">
                    <span class="cat-link">
                        <a class="category" href="category/politica/index.html">Política</a>
                    </span>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="politica/index.html" rel="bookmark">Política</a>
                        </h2>
                        <div class="entry-meta">
                            <span class="posted-on">
                                <i class="fa fa-calendar"></i>
                                <a href="politica/index.html" rel="bookmark">
                                    <time class="entry-date published" datetime="2017-04-17T19:52:54+00:00">17 abril, 2017</time>
                                </a>
                            </span>
                            <span class="byline">
                                <i class="fa fa-user"></i>
                                <span class="author vcard">
                                    <a class="url fn n" href="author/admin/index.html">admin</a>
                                </span>
                            </span>
                            <!--span class="comment">
                                <i class="fa fa-comment"></i>
                                <a href="politica/index.html#respond">Leave a comment</a>
                            </span-->
                        </div>
                    </header>
                    <div class="entry-excerpt">
                        <p>Spot Restauración Nacional. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                    </div>
                    <div class="entry-footer">
                        <a class="read-more" href="politica/index.html">Ingresar &#8250;</a>
                    </div>
                </div>
            </div>
            <!-- End Politica --->

        </div>
        <div class="col-lg-4">
            <div class="">
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
					        <li>
				                <a href="#">Elecciones 2017</a>
						    </li>
				        </ul>
                    </aside>

                    <aside id="archives-2" class="widget widget_archive">
                        <h2 class="widget-title">Archivos</h2>
                        <ul>
			                <!--li>
                                <a href="http://restauracionnacional.org.pe/2017/05/">mayo 2017</a>
                            </li>
	                        <li>
                                <a href="http://restauracionnacional.org.pe/2017/04/">abril 2017</a>
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
</div>

</main>

@endsection
