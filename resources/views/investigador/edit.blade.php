<form method="POST" action="{{ route('investigador.update') }}">
    @csrf
    @method('PUT')

    <div>
        <label for="passaport">Passaport:</label>
        <input type="text" name="passaport" id="passaport" value="{{ old('passaport') }}">
    </div>

    <div>
        <label for="campo">Campo a editar:</label>
        <select name="campo" id="campo">
            <option value="Passaport">Passaport</option>
            <option value="NomCognoms">Nom i Cognoms</option>
            <option value="CodiAssegMèdica">CodiAssegMèdica</option>
            <option value="Especialitat">Especialitat</option>
            <option value="Telefon">Telefon</option>
            <option value="Adreça">Adreça</option>
            <option value="Ciutat">Ciutat</option>
            <option value="País">País</option>
            <option value="Email">Email</option>
            <option value="Titulacio">Titulacio</option>
        </select>
    </div>

    <div>
        <label for="valor">Nuevo valor:</label>
        <input type="text" name="valor" id="valor" value="{{ old('valor') }}">
    </div>

    <div>
        <button type="submit">Actualizar</button>
    </div>
</form>

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary"><button>Torna enrere</button></a>
</div>