<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Esborrar Participa</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per esborrar entrades a Participa</h1>
<form method="POST" action="{{ route('participa.destroy') }}">
    @csrf
    @method('DELETE')

    <div>
        <label class="form-label" for="Passaport">Passaport:</label>
        <input class="form-control"  type="text" name="Passaport" id="Passaport" required>
    </div>

    <div>
        <label class="form-label" for="CodiProj">CodiProj:</label>
        <input class="form-control" type="text" name="CodiProj" id="CodiProj" required>
    </div>
        <br>
    <div>
        <button class="btn btn-danger"  type="submit">Eliminar Registro</button>
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
