@if (Auth::check())
    <p>Benvingut al menu principal, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('investigador.create') }}">Agregar un nuevo investigador</a><br/>
    <a href="{{ route('investigador.delete') }}">Esborra un investigador</a><br/>
</ul>
