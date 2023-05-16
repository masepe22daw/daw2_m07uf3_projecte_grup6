<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Crea Investigadors</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per afegir Investigadors</h1>

<form method="POST" action="{{ route('investigador.store') }}">
    @csrf

    <div class="mb-3 row">
        <label for="Passaport" class="form-label">Passaport:</label>
        <div class="col-md-6">
        <input type="text" name="Passaport" id="Passaport" class="form-control form-control-sm" required>
        </div>
        
    </div>

    <div class="mb-3 row">
        <label for="CodiAssegMèdica" class="form-label">Codi Assegurança Mèdica:</label>
        <div class="col-md-6">
        <input type="text" name="CodiAssegMèdica" id="CodiAssegMèdica" class="form-control form-control-sm">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="NomCognoms" class="form-label">Nom i Cognoms:</label>
        <div class="col-md-6">
        <input type="text" name="NomCognoms" id="NomCognoms" class="form-control form-control-sm" required>

        </div>
    </div>

    <div class="mb-3 row">
        <label for="Especialitat" class="form-label">Especialitat:</label>
        <div class="col-md-6">
        <input type="text" name="Especialitat" id="Especialitat" class="form-control form-control-sm">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="Telefon" class="form-label">Telèfon:</label>
        <div class="col-md-6">
        <input type="text" name="Telefon" id="Telefon" class="form-control form-control-sm">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="Adreça" class="form-label">Adreça:</label>
        <div class="col-md-6">
        <input type="text" name="Adreça" id="Adreça" class="form-control form-control-sm">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="Ciutat" class="form-label">Ciutat:</label>
        <div class="col-md-6">
        <input type="text" name="Ciutat" id="Ciutat" class="form-control form-control-sm">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="País" class="form-label">País:</label>
        <div class="col-md-6">
        <input type="text" name="País" id="País" class="form-control form-control-sm">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="Email" class="form-label">Email:</label>
        <div class="col-md-6">
        <input type="email" name="Email" id="Email" class="form-control form-control-sm" required>

        </div>
    </div>

    <div class="mb-3 row">
        <label for="Titulacio" class="form-label">Titulació:</label>
        <div class="col-md-6">
        <select name="Titulacio" id="Titulacio" class="form-select" >
            <option value="Doctor">Doctor</option>
            <option value="Master">Master</option>
            <option value="Grau">Grau</option>
            <option value="Estudiant">Estudiant</option>
            <option value="Altres">Altres</option>
        </select>
    </div>
    </div>

    <div class="mb-3 row">
        <button  type="submit" class="btn btn-primary col-md-3">Guardar</button>
    </div>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary">Torna enrere</a>
</div>
</div>