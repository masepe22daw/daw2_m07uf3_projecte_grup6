<form method="POST" action="{{ route('projecte.destroy') }}">
    @csrf

    <div>
        <label for="CodiProj">CodiProjecte:</label>
        <input type="text" name="CodiProj" id="CodiProj" required>
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