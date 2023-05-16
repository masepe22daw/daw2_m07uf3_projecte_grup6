<form method="POST" action="{{ route('participa.destroy') }}">
    @csrf
    @method('DELETE')

    <div>
        <label for="Passaport">Passaport:</label>
        <input type="text" name="Passaport" id="Passaport" required>
    </div>

    <div>
        <label for="CodiProj">CodiProj:</label>
        <input type="text" name="CodiProj" id="CodiProj" required>
    </div>

    <div>
        <button type="submit">Eliminar Registro</button>
    </div>
</form>

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif
<div>
    <a href="{{ route('participa.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>