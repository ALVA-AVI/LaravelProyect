<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
    <div class="header-menu fixed-top">
        <div class="nav navbar-brand navbar-header">
            <div class="panel-menu">
                <div class="main-menu">
                    <div class="content-logo">
                        <div class="box-logo">
                            <img src="{{ asset('img/logo/logohorizontal.png') }}" class="img-vn" alt="">
                        </div>
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
                                                <li><a href="{{ route('web.comite') }}">PRE-CANDIDATOS</a></li>
                                                <li><a href="{{ route('web.candidato') }}">CANDIDATOS</a></li>
                                            </ul>
                                        </li>
                                        <li class="{{ request()->routeIs('web.index')?setActive('web.index'):setActive('web.show') }}"><a href="{{ route('web.index') }}">NOTICIAS</a></li>
                                        <li><a target="_blank" href="https://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado">AFILIADOS</a></li>
                                        <li><a href="{{ route('afiliar') }}">AFILIACION</a></li>
                                        <li class="{{ setActive('web.modulo')  }}"><a href="{{ route('web.modulo',2) }}">INFORMACION</a></li>
                                        <li><a href="{{ route('web.contacta') }}">CONTACTO</a></li>
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
