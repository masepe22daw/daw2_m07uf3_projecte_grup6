@if (Auth::check())
    <p>Bienvenido, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('participa.create') }}">Agregar un nuevo participa</a><br/>

</ul>

<div>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>