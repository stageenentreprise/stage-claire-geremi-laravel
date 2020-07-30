<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset ('css/main.css?debug='.mt_rand(0,100000000)) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>{{$title ?? 'Bienvenue à l\'accueil'}}</title>
    @yield('head')
</head>
<body>
    <header>

        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('/images/formacitron.png') }}" alt="logo formacitron - formations pour gens pressés">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample02">
              <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item active">
                  <a class="nav-link" href="{{url('/categories/liste')}}">Catégories <span class="sr-only">(current)</span></a>
                </li> --}}
                <div class="dropdown show">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catégories
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($rootCategories as $category)
                          <a class="dropdown-item" href="{{url('/category/consultation/'. $category->slug)}}">{{$category->name}}</a>
                      @endforeach
                  </div>
                </div>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/formations')}}">Nos formations</a>
                </li>
              </ul>
            </div>
        <nav class="navbar navbar-default float-right">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/dashboard')}}">Tableau de bord</a>
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
                    <li><a class="navbar-brand" href="{{url('/register')}}">INSCRIPTION</a></li>
                    <li><a class="navbar-brand" href="{{url('/login')}}">CONNEXION</a></li>
                @endif
            </ul>
        </nav>
    </header>


    @yield('content')

    @yield('footer')


    @yield('scripts')

</body>
</html>
