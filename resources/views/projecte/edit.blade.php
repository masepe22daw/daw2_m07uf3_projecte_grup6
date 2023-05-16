<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Editar Projecte</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per eliminar Projectes</h1>
<form method="POST" action="{{ route('projecte.update') }}">
    @csrf
    @method('PUT')
    <div>
        <label for="CodiProj">Código del Proyecto:</label>
        <input type="text" name="CodiProj" id="CodiProj" required>
    </div>

    <div>
        <label for="campo">Campo:</label>
        <select name="campo" id="campo" required>
            <option value="Nom">Nombre</option>
            <option value="DataInici">Fecha de Inicio</option>
            <option value="DataFinal">Fecha de Finalización</option>
            <option value="Classificacio">Clasificación</option>
            <option value="HoresAssignades">Horas Asignadas</option>
            <option value="PressupostAssignat">Presupuesto Asignado</option>
            <option value="MaxNumInvestigadors">Número Máximo de Investigadores</option>
            <option value="Responsable">Responsable</option>
            <option value="Investigacio">Investigación</option>
            <option value="Idioma">Idioma</option>
        </select>
    </div>

    <div>
        <label for="valor">Nuevo valor:</label>
        <input type="text" name="valor" id="valor" required>
    </div>

    <div>
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <a href="{{ route('projecte.index') }}" >
        <button class="btn btn-secondary">Volver</button>
    </a>
</div>

    </div>