<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Menu Investigador</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
@if (Auth::check())
    <h1>Benvingut al menu principal, {{ Auth::user()->name }}</h1>
@else
    <p>No estás autenticado.</p>
@endif

<ul class="list-group">
    <li class="list-group-item">
        <a href="{{ route('investigador.create') }}" class="link-primary">Agregar un nuevo investigador</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('investigador.delete') }}" class="link-primary">Esborra un investigador</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('investigador.edit') }}" class="link-primary">Edita un investigador</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('investigador.search') }}" class="link-primary">Busca un investigador</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('investigador.pdf-form') }}" class="link-primary">Genera un PDF</a>
    </li>
</ul>

<div class="mt-3">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Torna enrere</a>
</div>
    </div>