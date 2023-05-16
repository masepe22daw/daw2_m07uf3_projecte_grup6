<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Buscar Participa</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per buscar entrades a Participa</h1>
<form method="POST" action="{{ route('participa.search') }}">
    @csrf

    <div class="form-group">
        <label for="Passaport">Passaport:</label>
        <input type="text" name="Passaport" id="Passaport" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="CodiProj">CodiProj:</label>
        <input type="text" name="CodiProj" id="CodiProj" class="form-control" required>
    </div>
        <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

@if (isset($participa))
    <!-- Mostrar los datos del registro encontrado -->
    <div>
        <h2>Datos del registro:</h2>
        <p>Passaport: {{ $participa->Passaport }}</p>
        <p>CodiProj: {{ $participa->CodiProj }}</p>
        <p>DataInici: {{ $participa->DataInici }}</p>
        <p>DataFinal: {{ $participa->DataFinal }}</p>
        <p>Retribucio: {{ $participa->Retribucio }}</p>
        <p>ParticipacioProrrogable: {{ $participa->ParticipacioProrrogable }}</p>
        <p>ParticipacioPublicacio: {{ $participa->ParticipacioPublicacio }}</p>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<br/>
<div>
    <a href="{{ route('investigador.index') }}" >
        <button class="btn btn-secondary">Torna enrere</button>
    </a>
</div>

    </div>