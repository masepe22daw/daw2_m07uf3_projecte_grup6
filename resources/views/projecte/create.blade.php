<head>
    <meta charset="UTF-8">
    <title>Crea projectes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<form method="POST" action="{{ route('projecte.store') }}">
    @csrf

    <div>
        <label for="CodiProj">Código del Proyecto:</label>
        <input type="text" name="CodiProj" id="CodiProj" required>
    </div>

    <div>
        <label for="Nom">Nombre:</label>
        <input type="text" name="Nom" id="Nom" required>
    </div>

    <div>
        <label for="DataInici">Fecha de inicio:</label>
        <input type="date" name="DataInici" id="DataInici" required>
    </div>

    <div>
        <label for="DataFinal">Fecha de finalización:</label>
        <input type="date" name="DataFinal" id="DataFinal"  required>
</div>
<div>
    <label for="Classificacio">Clasificación:</label>
    <select name="Classificacio" id="Classificacio" required>
        <option value="Tècnica" >Tècnica</option>
        <option value="Salut" >Salut</option>
        <option value="Científica" >Científica</option>
        <option value="Altres">Altres</option>
    </select>
</div>

<div>
    <label for="HoresAssignades">Horas asignadas:</label>
    <input type="number" name="HoresAssignades" id="HoresAssignades"  required>
</div>

<div>
    <label for="PressupostAssignat">Presupuesto asignado:</label>
    <input type="number" name="PressupostAssignat" id="PressupostAssignat" step="1"  required>
</div>

<div>
    <label for="MaxNumInvestigadors">Máximo número de investigadores:</label>
    <input type="number" name="MaxNumInvestigadors" id="MaxNumInvestigadors"  required>
</div>

<div>
    <label for="Responsable">Responsable:</label>
    <input type="text" name="Responsable" id="Responsable"  required>
</div>

<div>
    <label for="Investigacio">Investigación:</label>
    <select name="Investigacio" id="Investigacio" required>
        <option value="Nacional" >Nacional</option>
        <option value="Europea">Europea</option>
        <option value="Internacional">Internacional</option>
    </select>
</div>

<div>
    <label for="Idioma">Idioma:</label>
    <input type="text" name="Idioma" id="Idioma"  required>
</div>

<div>
    <button type="submit">Crear Proyecto</button>
</div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <a href="{{ route('projecte.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>