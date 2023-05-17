<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Buscar Usuaris</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per buscar Usuaris</h1>
<form method="POST" action="{{ route('usuaris.search') }}" class="form">
    @csrf
    <div class="form-group">
    <label for="email">Correu electrònic del usuari que desitges buscar:</label>
    <input type="text" name="email" id="email" class="form-control" autocomplete="off">
</div><br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

<!-- Agrega una sección para mostrar los resultados -->
<div id="resultados">
    @if(isset($usuari))
        <h2>Detalls del usuari</h2>
        <p>ID: {{ $usuari->id }}</p>
        <p>Nombre: {{ $usuari->name }}</p>
        <p>Email: {{ $usuari->email }}</p>
        <p>Tipo: {{ $usuari->Tipus }}</p>
        <p>Última hora de entrada: {{ $usuari->DarreraHoraEntrada }}</p>
        <p>Última hora de salida: {{ $usuari->DarreraHoraSortida }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<br/>
<div>
    <a href="{{ route('usuaris.index') }}" ><button class="btn btn-secondary">Torna enrere</button></a>
</div>
