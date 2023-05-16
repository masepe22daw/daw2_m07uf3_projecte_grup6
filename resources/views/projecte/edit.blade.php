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
        <button type="submit">Actualizar</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <a href="{{ route('projecte.index') }}" class="btn btn-secondary">
        <button>Volver</button>
    </a>
</div>
