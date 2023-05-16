<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Menu Investigador</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<form method="POST" action="{{ route('investigador.destroy') }}">
    @csrf
    @method('DELETE')
    <div class="mb-3">
        <label for="Passaport" class="form-label">Passaport:</label>
        <input type="text" name="Passaport" id="Passaport" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="CodiProj" class="form-label">codiProj:</label>
        <input type="text" name="CodiProj" id="CodiProj" class="form-control" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary">Torna enrere</a>
</div>
    </div>