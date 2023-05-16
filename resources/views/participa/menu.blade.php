@if (Auth::check())
    <p>Bienvenido, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('participa.create') }}">Afegir un nou registre a participa</a><br/>
    <a href="{{ route('participa.delete') }}">Elimina  un registre de  participa</a><br/>

</ul>

<div>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>