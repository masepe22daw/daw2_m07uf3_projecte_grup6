<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>PDF Investigadors</title>
</head>
<style>
        .content-container {
            margin-left: 20px;
        }
    </style>
<div class="content-container">
<h1>Benvingut a l'interficie per crear PDF de Investigadors</h1>
<form action="{{ route('investigador.generar-pdf') }}" method="POST">
  @csrf
  <div>
    <label for="passaport">Passaport:</label>
    <input type="text" id="passaport" name="passaport" required>
  </div><br>
  <button type="submit" class="btn btn-primary">Generar PDF</button><br>
</form>

<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary">Torna enrere</a>
</div>
</div>

