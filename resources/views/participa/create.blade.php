<form method="POST" action="{{ route('participa.store') }}">
    @csrf

    <div>
        <label for="Passaport">Passaport:</label>
        <input type="text" name="Passaport" id="Passaport" required>
    </div>

    <div>
        <label for="CodiProj">CodiProj:</label>
        <input type="text" name="CodiProj" id="CodiProj" required>
    </div>

    <div>
        <label for="DataInici">DataInici:</label>
        <input type="date" name="DataInici" id="DataInici" required>
    </div>

    <div>
        <label for="DataFinal">DataFinal:</label>
        <input type="date" name="DataFinal" id="DataFinal" required>
    </div>

    <div>
        <label for="Retribucio">Retribucio:</label>
        <input type="text" name="Retribucio" id="Retribucio" required>
    </div>

    <div>
    <label for="ParticipacioProrrogable">ParticipacioProrrogable:</label>
    <select name="ParticipacioProrrogable" id="ParticipacioProrrogable">
        <option value="Sí">Sí</option>
        <option value="No">No</option>
    </select>
</div>

<div>
    <label for="ParticipacioPublicacio">ParticipacioPublicacio:</label>
    <select name="ParticipacioPublicacio" id="ParticipacioPublicacio">
        <option value="Sí">Sí</option>
        <option value="No">No</option>
    </select>
</div>


    <div>
        <button type="submit">Crear Participa</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <a href="{{ route('participa.index') }}" class="btn btn-secondary">
        <button>Torna enrere</button>
    </a>
</div>
