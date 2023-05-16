<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Menu Projectes</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
@if (Auth::check())
    <h1>Benvingut al menú principal de Projectes, {{ Auth::user()->name }}</h1>
@else
    <p>No estás autenticado.</p>
@endif

<ul class="list-group">
    <li class="list-group-item"><a href="{{ route('projecte.create') }}">Agregar un nuevo projecte</a></li>
    <li class="list-group-item"><a href="{{ route('projecte.delete') }}">Eliminar un projecte</a></li>
    <li class="list-group-item"><a href="{{ route('projecte.edit') }}">Editar un projecte</a></li>
    <li class="list-group-item"><a href="{{ route('projecte.search') }}">Buscar un projecte</a></li>
</ul>
<br>
<div>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Torna enrere</a>
</div>

    </div>