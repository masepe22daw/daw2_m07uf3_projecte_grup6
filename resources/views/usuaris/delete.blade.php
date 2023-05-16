<form method="POST" action="{{ route('usuaris.destroy') }}">
    @csrf
    @method('DELETE')
    <div>
        <label for="user_id">ID de Usuario:</label>
        <input type="text" name="user_id" id="user_id" required>
    </div>

    <div>
        <button type="submit">Eliminar Usuario</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div>
    <a href="{{ route('usuaris.index') }}"><button>Volver</button></a>
</div>
