<form method="POST" action="{{ route('usuaris.store') }}">
    @csrf

    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="Tipus">Tipo:</label>
        <select name="Tipus" id="Tipus" required>
            <option value="gestor">Gestor</option>
            <option value="director">Director</option>
        </select>
    </div>

    <div>
        <button type="submit">Agregar Usuario</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

<div>
    <a href="{{ route('usuaris.index') }}">Volver</a>
</div>
