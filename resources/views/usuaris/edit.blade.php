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
<h1>Benvingut a l'interficie per editar Usuaris</h1>
<form method="POST" action="{{ route('usuaris.update') }}" class="mb-3">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="email" class="form-label">Correo electrónico del usuario:</label>
    <input type="text" name="email" id="email" class="form-control" required>
</div>


    <div class="form-group">
        <label for="campo" class="form-label">Campo a Editar:</label>
        <select name="campo" id="campo" class="form-control" required>
            <option value="name">Nombre</option>
            <option value="email">Email</option>
            <option value="Tipus">Tipo</option>
        </select>
    </div>

    <div class="form-group">
        <label for="value" class="form-label">Nuevo Valor:</label>
        <input type="text" name="value" id="value" class="form-control" required>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
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

    </div>


<div>
    <a href="{{ route('usuaris.index') }}"><button class="btn btn-secondary">Volver</button></a>
</div>
