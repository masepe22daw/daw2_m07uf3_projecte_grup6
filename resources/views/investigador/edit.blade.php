<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Editar Participa</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per  editar a Investigador</h1>
<form method="POST" action="{{ route('investigador.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="passaport" class="form-label">Passaport:</label>
        <input type="text" name="passaport" id="passaport" class="form-control">
    </div>

    <div class="mb-3">
        <label for="campo" class="form-label">Campo a editar:</label>
        <select name="campo" id="campo" class="form-select">
            <option value="NomCognoms">Nom i Cognoms</option>
            <option value="CodiAssegMèdica">CodiAssegMèdica</option>
            <option value="Especialitat">Especialitat</option>
            <option value="Telefon">Telefon</option>
            <option value="Adreça">Adreça</option>
            <option value="Ciutat">Ciutat</option>
            <option value="País">País</option>
            <option value="Email">Email</option>
            <option value="Titulacio">Titulacio</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="valor" class="form-label">Nuevo valor:</label>
        <input type="text" name="valor" id="valor" class="form-control">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary">Torna enrere</a>
</div>
    </div>