<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Menu principal</title>
</head>
<body>
    <div class="container">
        @if (Auth::check())
            <h1>Benvingut al menu principal, {{ Auth::user()->name }}</h1>
        @else
            <p>No estás autenticado.</p>
        @endif

        @if(auth()->user()->Tipus == 'gestor' || auth()->user()->Tipus == 'director')
            <div class="mb-3">
                <a href="{{ route('investigador.index') }}" class="link-primary">Accedeix al menú de manteniment de les dades de la taula de INVESTIGADORS</a>
            </div>
            <div class="mb-3">
                <a href="{{ route('projecte.index') }}" class="link-primary">Accedeix al menú de manteniment de les dades de la taula de PROJECTES</a>
            </div>
            <div class="mb-3">
                <a href="{{ route('participa.index') }}" class="link-primary">Accedeix al menú de manteniment de les dades de la taula de PARTICIPA</a>
            </div>
        @endif

        @if(auth()->user()->Tipus == 'director')
            <div class="mb-3">
                <a href="{{ route('usuaris.index') }}" class="link-primary">Accedeix al menú de manteniment de les dades dels Usuaris</a>
            </div>
        @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
