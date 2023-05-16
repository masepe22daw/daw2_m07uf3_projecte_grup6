<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Menu Participa</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
@if (Auth::check())
    <h1 >Benvingut al menú d'Usuaris, {{ Auth::user()->name }}</h1>
@else
    <p >No estás autenticado.</p>
@endif

<ul class="list-group">
    <li class="list-group-item"><a href="{{ route('usuaris.create') }}">Afegir un nou usuari</a></li>
    <li class="list-group-item"><a href="{{ route('usuaris.delete') }}">Esborrar un usuari</a></li>
    <li class="list-group-item"><a href="{{ route('usuaris.edit') }}">Editar un usuari</a></li>
    <li class="list-group-item"><a href="{{ route('usuaris.search') }}">Busca un usuari</a></li>
    <li class="list-group-item"><a href="{{ route('usuaris.pdf-form') }}">Generar un PDF</a></li>
</ul>

<div class="mt-4">
    <a href="{{ route('dashboard') }}" ><button class="btn btn-secondary">Torna enrere</button></a>
</div>

    </div>