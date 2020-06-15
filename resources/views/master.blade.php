<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset ('css/main.css?debug='.mt_rand(0,100000000)) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>{{$title ?? 'Bienvenue à l\'accueil'}}</title>
</head>
<body>
    <header>
        ceci est un header
    </header>


    @yield('content')

    @yield('footer')
</body>
</html>