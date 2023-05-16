<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Inici</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    
                    <div class="form-group">
                        <label for="email">Mail</label>
                        <input id="email" class="form-control" type="email" name="email" required autofocus>
                    </div>

                  
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                    </div>

                    <button type="submit" class="btn btn-primary">Log in</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
