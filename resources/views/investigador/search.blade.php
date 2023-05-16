<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Crea Investigadors</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<form method="POST" action="{{ route('investigador.search') }}">
    @csrf
    <div class="mb-3">
        <label for="passaport" class="form-label">Pasaporte:</label>
        <input type="text" name="passaport" id="passaport" value="{{ old('passaport') }}" class="form-control">
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>


<div id="resultados">
    @if(isset($investigador))
        <h2>Detalles del Investigador</h2>
        <p>Passaport: {{ $investigador->Passaport }}</p>
        <p>Codi Assegurança Mèdica: {{ $investigador->CodiAssegMèdica }}</p>
        <p>Nom y Cognoms: {{ $investigador->NomCognoms }}</p>
        <p>Especiaptat: {{ $investigador->Especiaptat }}</p>
        <p>Telèfon: {{ $investigador->Telefon }}</p>
        <p>Adreça: {{ $investigador->Adreça }}</p>
        <p>Ciutat: {{ $investigador->Ciutat }}</p>
        <p>País: {{ $investigador->País }}</p>
        <p>Email: {{ $investigador->Email }}</p>
        <p>Titulació: {{ $investigador->Titulacio }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<br/>
<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary">Torna enrere</a>
</div>

</div>