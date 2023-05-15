@if (Auth::check())
    <p>Benvingut al menu principal, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('investigador.create') }}">Agregar un nuevo investigador</a><br/>
    <a href="{{ route('investigador.delete') }}">Esborra un investigador</a><br/>
    <a href="{{ route('investigador.edit') }}">Edita un investigador</a><br/>
    <a href="{{ route('investigador.search') }}">Busca un investigador</a><br/>
    <a href="{{ route('investigador.pdf') }}">Genera un PDF d'un investigador</a><br/>
</ul>

<div>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>