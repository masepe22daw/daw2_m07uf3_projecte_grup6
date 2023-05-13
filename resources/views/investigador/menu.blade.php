@if (Auth::check())
    <p>Benvingut al menu principal, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('investigador.create') }}">Agregar un nuevo investigador</a><br/>
    <a href="{{ route('investigador.search') }}">Ver todos los investigadores</a><br/>
    <a href="{{ route('investigador.edit')}}">Editar información del investigador</a><br/>
    <a href="{{ route('investigador.destroy')}}">Eliminar investigador</a><br/>
</ul>
