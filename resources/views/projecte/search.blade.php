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
        <ul>
            <li>CodiProj: {{ $projecte->CodiProj}}</li>
            <li>Nom: {{ $projecte->Nom}}</li>
            <li>DataInici: {{ $projecte->DataInici }}</li>
            <li>DataFinal: {{ $projecte->DataFinal }}</li>
            <li>Classificacio: {{ $projecte->Classificacio }}</li>
            <li>HoresAssignades: {{ $projecte->HoresAssignades }}</li>
            <li>PressupostAssignat: {{ $projecte->PressupostAssignat }}</li>
            <li>MaxNumInvestigadors: {{ $projecte->MaxNumInvestigadors }}</li>
            <li>Responsable: {{ $projecte->Responsable }}</li>
            <li>Investigacio: {{ $projecte->Investigacio }}</li>
            <li>Idioma: {{ $projecte->Idioma }}</li>
        </ul>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<br/>
<div>
    <a href="{{ route('projecte.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>
