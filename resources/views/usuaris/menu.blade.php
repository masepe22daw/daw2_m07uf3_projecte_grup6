@if (Auth::check())
    <p>Benvingut al menu principal, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('usuaris.create') }}">Afegir un nou usuari</a><br/>

</ul>

<div>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>