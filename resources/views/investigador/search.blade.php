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
        <ul>
            <li>Passaport: {{ $investigador->Passaport }}</li>
            <li>Codi Assegurança Mèdica: {{ $investigador->CodiAssegMèdica }}</li>
            <li>Nom y Cognoms: {{ $investigador->NomCognoms }}</li>
            <li>Especialitat: {{ $investigador->Especialitat }}</li>
            <li>Telèfon: {{ $investigador->Telefon }}</li>
            <li>Adreça: {{ $investigador->Adreça }}</li>
            <li>Ciutat: {{ $investigador->Ciutat }}</li>
            <li>País: {{ $investigador->País }}</li>
            <li>Email: {{ $investigador->Email }}</li>
            <li>Titulació: {{ $investigador->Titulacio }}</li>
        </ul>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<br/>
<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>
