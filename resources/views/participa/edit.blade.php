<form method="POST" action="{{ route('participa.update') }}">
    @csrf
    @method('PUT')

    <div>
        <label for="Passaport">Passaport:</label>
        <input type="text" name="Passaport" id="Passaport" required>
    </div>

    <div>
        <label for="CodiProj">CodiProj:</label>
        <input type="text" name="CodiProj" id="CodiProj" required>
    </div>

    <div>
        <label for="campo">Campo a editar:</label>
        <select name="campo" id="campo" required>
    <option value="DataInici">DataInici</option>
    <option value="DataFinal">DataFinal</option>
    <option value="Retribucio">Retribucio</option>
    <option value="ParticipacioProrrogable">ParticipacioProrrogable</option>
    <option value="ParticipacioPublicacio">ParticipacioPublicacio</option>
</select>

    </div>

    <div>
        <label for="valor">Nuevo valor:</label>
        <input type="text" name="valor" id="valor" required>
    </div>

    <div>
        <button type="submit">Modificar Registro</button>
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
