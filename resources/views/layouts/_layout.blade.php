<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileImage" content="{{ asset('img/2017/04/cropped-LOGO-270x270.png') }}" />
    <title>@yield('title','Partido Político Restauración Nacional Perú')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stilo092020.css') }}">
    <link rel="icon" href="{{ asset('img/2017/04/cropped-LOGO-32x32.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('img/2017/04/cropped-LOGO-192x192.png') }}" sizes="192x192">
    @yield('links')
</head>
<body>
    {{-- Header --}}
    @include('layouts.partials._header')
  @yield('banner')
        <!--End Header-->
        <!-- Contenido-->
            <main role="main" class="container">
                <div class="container">
                    @yield('contenido')
                </div>
            </main>
        <!--End Contenido-->



    {{-- Footer --}}
    @include('layouts.partials._footer')
    {{-- End Footer --}}
</body>
</html>


<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')