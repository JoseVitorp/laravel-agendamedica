<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>   
        
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">    
    
    <script>
        $(function () { $('[data-toggle="tooltip"]').tooltip() }); 
    </script>    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://lh3.googleusercontent.com/hwSeeCK5W96qWzU6h-b1L6L7E1c_IgZX6pscyXFiWPuYUDAW5p_QsY765RTU6WG8kIzP9N4YRQVYZNy78r5ufPzb-1z7p_W8jbhDjDSm5VdNjKBedTXI8T3JV6JaTi9gmXXmpCQ_sAqOntjaeacN5hVZQIT0CA3qV_xI_7QyMfL0pYD7suo-4N8-DxMWyNKoYZPDrus0HWnZIjLT7t8KhDi9nCqcD9sY2xZM_r-gqpI9TIphOvxgU8ogsYH1q0ECS-P5AQO4Z2-LUo8NEde2V6uL70KBrh7kzDeQTm2K-E_k-ix60HB3TVJfS85kB6XpWGYtwcxwKqVxrStX6QZdTgbZNyDv5GmxOUFmTkjtoYguy2jYOEF8Zvb4WHAuXOjncjyl3lpB1Q7Y84qE-u-pWDBGh6impdYI4hkQZViGNFH_Cbo_Ukuyk2sMMpqUQ_I63k20UvBv8h3CFy764G_yKdfMSwwIhgaAi138ALW1AksJFzSDhx8gYbx6rs4A1P6sb_Y6n_ALKCCEK70-IbVG-uUFxh0OoQDQ3MmQ-4eVSR51Frk3AtOcJiFJwnnG4z9WEuiQLIf5oPjV2ImP3HncVF5fq7LeNCieZNusQBBAgcvSFiIYOFTcvrO1dA4wqdNt46SbcBOnmF0BIKZeEOhZBmTed7fgct11no9hhrWfOvx7nYUaaJvyimiii1BP8nosFky4yv8hPy6oRSXvw9wjTWDP=w251-h66-no?authuser=0">
                </a>               
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->getTratamento(Auth::user()->medico_id) . " " . Auth::user()->name }} <span class="caret"></span>
                                </a>

                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->medico_id != null)
                                        <a class="dropdown-item" href="{{ route('medico.especialidade.index',Auth::user()->medico_id) }}">
                                            Especialidades médicas
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('flash-message');
            @yield('content')
        </main>
    </div>
</body>
</html>

