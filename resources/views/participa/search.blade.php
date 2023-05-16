<form method="POST" action="{{ route('participa.search') }}">
    @csrf

    <div>
        <label for="Passaport">Passaport:</label>
        <input type="text" name="Passaport" id="Passaport" required>
    </div>

    <div>
        <label for="CodiProj">CodiProj:</label>
        <input type="text" name="CodiProj" id="CodiProj" required>
    </div>

    <div>
        <button type="submit">Buscar</button>
    </div>
</form>

@if (isset($participa))
    <!-- Mostrar los datos del registro encontrado -->
    <div>
        <h2>Datos del registro:</h2>
        <p>Passaport: {{ $participa->Passaport }}</p>
        <p>CodiProj: {{ $participa->CodiProj }}</p>
        <p>DataInici: {{ $participa->DataInici }}</p>
        <p>DataFinal: {{ $participa->DataFinal }}</p>
        <p>Retribucio: {{ $participa->Retribucio }}</p>
        <p>ParticipacioProrrogable: {{ $participa->ParticipacioProrrogable }}</p>
        <p>ParticipacioPublicacio: {{ $participa->ParticipacioPublicacio }}</p>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<br/>
<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>
