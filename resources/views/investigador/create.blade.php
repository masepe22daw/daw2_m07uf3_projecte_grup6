<form method="POST" action="{{ route('investigador.store') }}">
    @csrf

    <div>
        <label for="Passaport">Passaport:</label>
        <input type="text" name="Passaport" id="Passaport" required>
    </div>

    <div>
        <label for="CodiAssegMèdica">Codi Assegurança Mèdica:</label>
        <input type="text" name="CodiAssegMèdica" id="CodiAssegMèdica">
    </div>

    <div>
        <label for="NomCognoms">Nom i Cognoms:</label>
        <input type="text" name="NomCognoms" id="NomCognoms" required>
    </div>

    <div>
        <label for="Especialitat">Especialitat:</label>
        <input type="text" name="Especialitat" id="Especialitat">
    </div>

    <div>
        <label for="Telefon">Telèfon:</label>
        <input type="text" name="Telefon" id="Telefon">
    </div>

    <div>
        <label for="Adreça">Adreça:</label>
        <input type="text" name="Adreça" id="Adreça">
    </div>

    <div>
        <label for="Ciutat">Ciutat:</label>
        <input type="text" name="Ciutat" id="Ciutat">
    </div>

    <div>
        <label for="País">País:</label>
        <input type="text" name="País" id="País">
    </div>

    <div>
        <label for="Email">Email:</label>
        <input type="email" name="Email" id="Email" required>
    </div>

    <div>
        <label for="Titulacio">Titulació:</label>
        <select name="Titulacio" id="Titulacio">
            <option value="Doctor">Doctor</option>
            <option value="Master">Master</option>
            <option value="Grau">Grau</option>
            <option value="Estudiant">Estudiant</option>
            <option value="Altres">Altres</option>
        </select>
    </div>

    <div>
        <button type="submit">Guardar</button>
    </div>
</form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div>
    <a href="{{ route('investigador.index') }}" class="btn btn-secondary">Volver</a>
</div>