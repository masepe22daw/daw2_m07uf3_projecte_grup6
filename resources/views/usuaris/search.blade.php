
<form method="POST" action="{{ route('usuaris.search') }}" class="form">
    @csrf
    <div class="form-group">
        <label for="id">ID del usuario que deseas buscar:</label>
        <input type="text" name="id" id="id" class="form-control" autocomplete="off">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

<!-- Agrega una sección para mostrar los resultados -->
<div id="resultados">
    @if(isset($usuari))
        <h2>Detalles del usuario</h2>
        <p>ID: {{ $usuari->id }}</p>
        <p>Nombre: {{ $usuari->name }}</p>
        <p>Email: {{ $usuari->email }}</p>
        <p>Tipo: {{ $usuari->Tipus }}</p>
        <p>Última hora de entrada: {{ $usuari->DarreraHoraEntrada }}</p>
        <p>Última hora de salida: {{ $usuari->DarreraHoraSortida }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<br/>
<div>
    <a href="{{ route('usuaris.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>
