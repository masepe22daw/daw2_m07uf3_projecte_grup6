<form method="POST" action="{{ route('usuaris.update') }}">
    @csrf
    @method('PUT')
    <div>
        <label for="user_id">ID de Usuario:</label>
        <input type="text" name="user_id" id="user_id" required>
    </div>

    <div>
        <label for="campo">Campo a Editar:</label>
        <select name="campo" id="campo" required>
            <option value="name">Nombre</option>
            <option value="email">Email</option>
            <option value="Tipus">Tipo</option>
        </select>
    </div>

    <div>
        <label for="value">Nuevo Valor:</label>
        <input type="text" name="value" id="value" required>
    </div>

    <div>
        <button type="submit">Actualizar Usuario</button>
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
