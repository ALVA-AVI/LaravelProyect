<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
    <div class="header-menu fixed-top">
        <div class="nav navbar-brand navbar-header">
            <div class="panel-menu">
                <div class="main-menu">
                    <div class="content-logo">
                        <div class="image-logo">
                            <a href="{{ route('index') }}" class="" rel="home" itemprop="url">
                                <img width="400" height="100" src="{{ asset('img/2017/04/cropped-logoo-blue.png') }}" class="custom-logo" alt="" itemprop="logo" sizes="(max-width: 611px) 100vw, 611px" />
                            </a>
                        </div>
                        <ul class="row justify-content-center ico-facebook">
                            <li class="icon-fb">
                                <a class="facebook" href="https://www.facebook.com/mir.juntosporelcambio">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="content-menu">
                        <div class="">
                            <header class="navega-nav">
                                <input type="checkbox" id="btn-menu">
                                <label class="btn-menu" for="btn-menu">
                                    <i class="fa fa-align-justify"></i>
                                </label>
                                <nav class="menu">
                                    <ul class="menu-nav-colect">
                                        <li class="{{ setActive('index') }}"><a href="{{ route('index') }}">INICIO</a></li>
                                        <li class="drop-menu">
                                            <a href="#">ELECCIONES 2021 &nbsp;<i class="fa fa-caret-down"></i></a>
                                            <ul class="drop-content">
                                                <li><a href="">COMITES</a></li>
                                                <li><a href="">CANDIDATOS</a></li>
                                            </ul>
                                        </li>
                                        <li class="{{ request()->routeIs('web.index')?setActive('web.index'):setActive('web.show') }}"><a href="{{ route('web.index') }}">NOTICIAS</a></li>
                                        <li><a target="_blank" href="https://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado">AFILIADOS</a></li>
                                        <li><a target="_blank" href="{{ asset('ficha-afiliacion/FICHA_AFILIACIÓN(RN).pdf') }}">AFILIACION</a></li>
                                        <li class="{{ setActive('web.modulo')  }}"><a href="{{ route('web.modulo',2) }}">DOCUMENTOS</a></li>
                                        <li><a href="">CONTACTO</a></li>
                                        <!--li class="{{ setActive('login')  }}"><a href="{{ route('login') }}">LOGIN</a></li-->
                                        <li><a href="{{ route('home') }}">LOGIN</a></li>
                                    </ul>
                                </nav>
                            </header>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
        
    </div>
</nav>