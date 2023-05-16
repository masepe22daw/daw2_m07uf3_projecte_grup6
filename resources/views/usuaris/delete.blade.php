<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Eliminar Usuari</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per eliminar Usuaris</h1>
<form method="POST" action="{{ route('usuaris.destroy') }}">
    @csrf
    @method('DELETE')
    <div class="mb-3">
        <label for="user_id" class="form-label">ID de Usuario:</label>
        <input type="text" name="user_id" id="user_id" class="form-control" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
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
    <a href="{{ route('usuaris.index') }}" ><button class="btn btn-secondary">Volver</button></a>
</div>

    </div>
