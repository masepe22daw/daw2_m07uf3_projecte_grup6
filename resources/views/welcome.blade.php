<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Inici</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Benvingut a la pàgina web de gestió de la base de dades de projectes d'investigació de la Universitat Politècnica del Clot i
            Voltants (UPCV)</h1>
        @if (Route::has('login'))
            <div class="mt-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Inicia sessió</a>
                @endauth
            </div>
        @endif
    </div>
</body>
</html>
