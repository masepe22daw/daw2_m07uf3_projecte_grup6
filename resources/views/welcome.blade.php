<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inici</title>

    </head>
    <body>
        <h1>Benvingut a la pàgina web</h1>
        @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"><button>Inicia sessió</button></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><button>Registret</button></a>
                        @endif
                    @endauth
                </div>
        @endif

    </body>
</html>
