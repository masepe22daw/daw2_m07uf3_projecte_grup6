<form method="POST" action="{{ route('investigador.destroy') }}">
    @csrf

    <div>
        <label for="passaport">Passaport:</label>
        <input type="text" name="passaport" id="passaport" required>
    </div>

    <div>
        <button type="submit">Eliminar</button>
    </div>
</form>
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif
<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>