@if (Auth::check())
    <p>Benvingut al menu principal, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif

<ul>
    <a href="{{ route('projecte.create') }}">Agregar un nuevo projecte</a><br/>
    <a href="{{ route('projecte.delete') }}">Esborra un projecte</a><br/>
    <a href="{{ route('projecte.edit') }}">Edita un projecte</a><br/>
  
    
</ul>

<div>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>
