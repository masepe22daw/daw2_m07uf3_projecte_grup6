<title>Menu principal</title>
@if (Auth::check())
    <p>Benvingut al menu principal, {{ Auth::user()->name }}</p>
@else
    <p>No estás autenticado.</p>
@endif
    @if(auth()->user()->Tipus == 'gestor' || auth()->user()->Tipus == 'director')
        <a href="{{ route('investigador.index') }}">Accedeix a el menu de manteniment de les dades de les taules de INVESTIGADORS</a><br>
        <a href="{{ route('projecte.index') }}">Accedeix a el menu de manteniment de les dades de les taules de PROJECTES</a><br>
        <a href="{{ route('participa.index') }}">Accedeix a el menu de manteniment de les dades de les taules de PARTICIPA</a><br><br>

    @endif

    @if(auth()->user()->Tipus == 'director')
    <a href="{{ route('usuaris.index') }}">Accedeix a el menu de manteniment de les dades dels Usuaris</a><br><br>

        
    @endif
<form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
</form>
