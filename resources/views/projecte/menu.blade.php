@if (Auth::check())
    <p>Benvingut al menu principal, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('projecte.create') }}">Agregar un nuevo projecte</a><br/>
    <a href="{{ route('projecte.search') }}">Ver todos los projectes</a><br/>
    <a href="{{ route('projecte.edit')}}">Editar información del projecte</a><br/>
    <a href="{{ route('projecte.destroy')}}">Eliminar projecte</a><br/>
</ul>
