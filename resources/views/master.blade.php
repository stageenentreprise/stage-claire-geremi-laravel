<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset ('css/main.css?debug='.mt_rand(0,100000000)) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>{{$title ?? 'Bienvenue à l\'accueil'}}</title>
    @yield('head')
</head>
<body>
    <header>
        ceci est un header
        <nav class="navbar navbar-default float-right">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                    <li class="navbar-brand">{{Auth::user()->name}}</li>
                    <li>
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li><a class="navbar-brand" href="register">INSCRIPTION</a></li>
                    <li><a class="navbar-brand" href="login">CONNEXION</a></li>
                @endif
            </ul>
        </nav>
    </header>


    @yield('content')

    @yield('footer')
    @yield('scripts')
</body>
</html>
