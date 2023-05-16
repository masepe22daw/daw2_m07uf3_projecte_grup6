<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Crear Projectes</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per afegir Projectes</h1>
<form method="POST" action="{{ route('projecte.store') }}">
    @csrf

    <div class="mb-3">
        <label for="CodiProj" class="form-label">Código del Proyecto:</label>
        <input type="text" name="CodiProj" id="CodiProj" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="Nom" class="form-label">Nombre:</label>
        <input type="text" name="Nom" id="Nom" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="DataInici" class="form-label">Fecha de inicio:</label>
        <input type="date" name="DataInici" id="DataInici" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="DataFinal" class="form-label">Fecha de finalización:</label>
        <input type="date" name="DataFinal" id="DataFinal" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="Classificacio" class="form-label">Clasificación:</label>
        <select name="Classificacio" id="Classificacio" required class="form-select">
            <option value="Tècnica">Tècnica</option>
            <option value="Salut">Salut</option>
            <option value="Científica">Científica</option>
            <option value="Altres">Altres</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="HoresAssignades" class="form-label">Horas asignadas:</label>
        <input type="number" name="HoresAssignades" id="HoresAssignades" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="PressupostAssignat" class="form-label">Presupuesto asignado:</label>
        <input type="number" name="PressupostAssignat" id="PressupostAssignat" step="1" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="MaxNumInvestigadors" class="form-label">Máximo número de investigadores:</label>
        <input type="number" name="MaxNumInvestigadors" id="MaxNumInvestigadors" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="Responsable" class="form-label">Responsable:</label>
        <input type="text" name="Responsable" id="Responsable" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="Investigacio" class="form-label">Investigación:</label>
        <select name="Investigacio" id="Investigacio" required class="form-select">
            <option value="Nacional">Nacional</option>
            <option value="Europea">Europea</option>
            <option value="Internacional">Internacional</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="Idioma" class="form-label">Idioma:</label>
        <input type="text" name="Idioma" id="Idioma" required class="form-control">
    </div>
    <div>
    <button type="submit" class="btn btn-primary">Crear Proyecto</button>
</div>
</form>
@if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<div>
    <a href="{{ route('projecte.index') }}"><button class="btn btn-secondary">Torna enrere</button></a>
</div>

    </div>