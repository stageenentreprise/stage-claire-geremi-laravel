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
        
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/stage/stage-claire-geremi-laravel/public/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarsExample02">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/stage/stage-claire-geremi-laravel/public/gnia">Catégories <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/stage/stage-claire-geremi-laravel/public/formations">Nos formations</a>
                </li>
              </ul>
            </div>
        <nav class="navbar navbar-default float-right">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/stage/stage-claire-geremi-laravel/public/dashboard">Tableau de bord</a>
                  </li>
                @if (Auth::check())
                    <li class="navbar-brand">{{Auth::user()->name}}</li>
                    <li>
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li><a class="navbar-brand" href="/stage/stage-claire-geremi-laravel/public/register">INSCRIPTION</a></li>
                    <li><a class="navbar-brand" href="/stage/stage-claire-geremi-laravel/public/login">CONNEXION</a></li>
                @endif
            </ul>
        </nav>
    </header>


    @yield('content')

    @yield('footer')
    
    @yield('scripts')
    
</body>
</html>
