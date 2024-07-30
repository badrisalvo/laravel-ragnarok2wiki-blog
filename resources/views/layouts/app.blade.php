<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ragnarok 2 Mastery - Portal</title>
    <link rel="shortcut icon" href="{{ asset('img/ro2logo.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
html, body {
    height: 100%;
    margin: 0;
}
.toggle-buttonz {
    position: absolute;
    top: 5%;
    right: -150px;
    transform: translateY(400%);
}
.iconz {
    width: 160px;
    height: 90px;
}

#app {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
.floating-window {
    position: fixed;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.4);
    border: 0px solid #ccc;
	border-radius: 15px;
    padding: 20px;
    z-index: 9999;
    width: 250px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}
.floating-window.closed {
    transform: translateY(-50%) translateX(-100%);
}
main {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.navbar-background {
    background-image: url('../assets/img/meetings-page-bg.jpg');
    background-size: cover;
    background-position: center;
    width: 100%;
}
.card-header {
    background-image: url('../assets/img/meetings-page-bg.jpg');
    background-size: cover;
    background-position: center;
    width: 100%;
    color: white;
}
.card-body {
    background-image: url('../assets/img/meetings-page-bg.jpg');
    background-size: cover;
    background-position: center;
    width: 100%;
    color: white;
}
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <i><b> Ragnarok 2 Mastery : Home</b></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
    
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4 navbar-background">
            @yield('content')
        </main>
    </div>
    <footer class="navbar-background text-white">
            <div class="contact-us">
                <p class="mb-0 text-center">© 2024 Ragnarok 2 Mastery. All rights reserved.</p>
            </div>
        </footer>
</body>
<script>
           document.addEventListener("DOMContentLoaded", function() {
    var floatingWindow = document.getElementById('floatingWindow');
    var toggleButton = document.getElementById('toggleButton');
    var openIcon = document.getElementById('openIcon');
    var closeIcon = document.getElementById('closeIcon');

    toggleButton.addEventListener('click', function() {
        if (floatingWindow.classList.contains('closed')) {
            floatingWindow.classList.remove('closed');
            openIcon.style.display = 'none';
            closeIcon.style.display = 'block';
        } else {
            floatingWindow.classList.add('closed');
            openIcon.style.display = 'block';
            closeIcon.style.display = 'none';
        }
    });
});
</script>
</html>

