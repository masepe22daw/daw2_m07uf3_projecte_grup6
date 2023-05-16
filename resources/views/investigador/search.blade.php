<form method="POST" action="{{ route('investigador.search') }}">
    @csrf
    <div>
        <label for="passaport">Pasaporte:</label>
        <input type="text" name="passaport" id="passaport" value="{{ old('passaport') }}">
    </div>
    <div>
        <button type="submit">Buscar</button>
    </div>
</form>

<!-- Agrega una sección para mostrar los resultados -->
<div id="resultados">
    @if(isset($investigador))
        <h2>Detalls del Investigador</h2>
            <p>Passaport: {{ $investigador->Passaport }}</p>
            <p>Codi Assegurança Mèdica: {{ $investigador->CodiAssegMèdica }}</p>
            <p>Nom y Cognoms: {{ $investigador->NomCognoms }}</p>
            <p>Especiaptat: {{ $investigador->Especiaptat }}</p>
            <p>Telèfon: {{ $investigador->Telefon }}</p>
            <p>Adreça: {{ $investigador->Adreça }}</p>
            <p>Ciutat: {{ $investigador->Ciutat }}</p>
            <p>País: {{ $investigador->País }}</p>
            <p>Email: {{ $investigador->Email }}</p>
            <p>Titulació: {{ $investigador->Titulacio }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<br/>
<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>
