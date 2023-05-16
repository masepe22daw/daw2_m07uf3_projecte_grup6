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
<h1>Benvingut a l'interficie per buscar editar a Participa</h1>
<form method="POST" action="{{ route('participa.update') }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="Passaport">Passaport:</label>
        <input type="text" name="Passaport" id="Passaport" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="CodiProj">CodiProj:</label>
        <input type="text" name="CodiProj" id="CodiProj" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="campo">Campo a editar:</label>
        <select name="campo" id="campo" class="form-control" required>
            <option value="DataInici">DataInici</option>
            <option value="DataFinal">DataFinal</option>
            <option value="Retribucio">Retribucio</option>
            <option value="ParticipacioProrrogable">ParticipacioProrrogable</option>
            <option value="ParticipacioPublicacio">ParticipacioPublicacio</option>
        </select>
    </div>

    <div class="form-group">
        <label for="valor">Nuevo valor:</label>
        <input type="text" name="valor" id="valor" class="form-control" required>
    </div>
        <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Modificar Registro</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <a href="{{ route('participa.index') }}" >
        <button class="btn btn-secondary">Torna enrere</button>
    </a>
</div>

    </div>
    
