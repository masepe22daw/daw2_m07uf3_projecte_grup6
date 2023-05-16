<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Buscar Projecte</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per buscar Projectes</h1>
<form method="POST" action="{{ route('projecte.search') }}">
    @csrf
    <div>
        <label for="CodiProj">Codi del projecte que vols buscar:</label>
        <input type="text" name="CodiProj" id="CodiProj" value="{{ old('CodiProj') }}">
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

<!-- Agrega una sección para mostrar los resultados -->
<div id="resultados">
    @if(isset($projecte))
        <h2>Detalls del projecte</h2>
        <p>CodiProj: {{ $projecte->CodiProj}}</p>
        <p>Nom: {{ $projecte->Nom}}</p>
        <p>DataInici: {{ $projecte->DataInici }}</p>
        <p>DataFinal: {{ $projecte->DataFinal }}</p>
        <p>Classificacio: {{ $projecte->Classificacio }}</p>
        <p>HoresAssignades: {{ $projecte->HoresAssignades }}</p>
        <p>PressupostAssignat: {{ $projecte->PressupostAssignat }}</p>
        <p>MaxNumInvestigadors: {{ $projecte->MaxNumInvestigadors }}</p>
        <p>Responsable: {{ $projecte->Responsable }}</p>
        <p>Investigacio: {{ $projecte->Investigacio }}</p>
        <p>Idioma: {{ $projecte->Idioma }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<br/>
<div>
    <a href="{{ route('projecte.index') }}" ><button class="btn btn-secondary">Torna enrere</button></a>
</div>

    </div>

