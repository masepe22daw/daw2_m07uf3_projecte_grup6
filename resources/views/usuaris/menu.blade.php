@if (Auth::check())
    <p>Benvingut al menu principal, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('usuaris.create') }}">Agregar un nuevo usuaris</a><br/>
    <a href="{{ route('usuaris.search') }}">Ver todos los usuaris</a><br/>
    <a href="{{ route('usuaris.edit')}}">Editar información del usuaris</a><br/>
    <a href="{{ route('usuaris.destroy')}}">Eliminar usuaris</a><br/>
</ul>
