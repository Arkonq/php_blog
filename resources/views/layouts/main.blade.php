<!doctype html>
{{--main.blade.php--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Посты</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.favorites') }}">Избранное</a>
                    </li>
                @endauth
            </ul>

            <div class="navbar-nav ml-auto">

                @if( auth()->check() )

                    <div class="nav-item">
                        {{ auth()->user()->name }}
                    </div>
                    <div class="nav-item">
                        <form method="post" action="{{ route('logout') }}"> @csrf
                            <button class="btn btn-outline-danger btn-sm">Выйти</button>
                        </form>
                    </div>
                @else

                <div class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                </div>

                @endif
            </div>

        </div>
    </div>
</nav>

<div class="container py-4">

    @yield('content')

</div>

</body>
</html>
