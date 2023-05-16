<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Crear Usuaris</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per afegir Usuaris</h1>
<form method="POST" action="{{ route('usuaris.store') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="Tipus" class="form-label">Tipo:</label>
        <select name="Tipus" id="Tipus" class="form-select" required>
            <option value="gestor">Gestor</option>
            <option value="director">Director</option>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div>
    <a href="{{ route('usuaris.index') }}" class="btn btn-secondary">Volver</a>
</div>

    </div>
