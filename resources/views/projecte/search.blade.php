<form method="POST" action="{{ route('projecte.search') }}">
    @csrf
    <div>
        <label for="CodiProj">Codi del projecte que vols buscar:</label>
        <input type="text" name="CodiProj" id="CodiProj" value="{{ old('CodiProj') }}">
    </div>
    <div>
        <button type="submit">Buscar</button>
    </div>
</form>

<!-- Agrega una sección para mostrar los resultados -->
<div id="resultados">
    @if(isset($projecte))
        <h2>Detalls del projecte</h2>
            <p>CodiProj: {{ $projecte->CodiProj}}</p>
            <p>Nom: {{ $projecte->Nom}}</p>
            <p>DataInici: {{ $projecte->DataInici }}</p>
            <p>DataFinal: {{ $projecte->DataFinal }}</p>
            <p>Classificacio: {{ $projecte->Classificacio }}</p>
            <p>HoresAssignades: {{ $projecte->HoresAssignades }}</p>
            <p>PressupostAssignat: {{ $projecte->PressupostAssignat }}</p>
            <p>MaxNumInvestigadors: {{ $projecte->MaxNumInvestigadors }}</p>
            <p>Responsable: {{ $projecte->Responsable }}</p>
            <p>Investigacio: {{ $projecte->Investigacio }}</p>
            <p>Idioma: {{ $projecte->Idioma }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<br/>
<div>
    <a href="{{ route('projecte.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>
