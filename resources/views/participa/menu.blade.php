@if (Auth::check())
    <p>Bienvenido, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('participa.create') }}">Agregar un nuevo participa</a><br/>
    <a href="{{ route('participa.search') }}">Ver todos los participaes</a><br/>
    <a href="{{ route('participa.edit')}}">Editar información del participa</a><br/>
    <a href="{{ route('participa.destroy')}}">Eliminar participa</a><br/>
</ul>
