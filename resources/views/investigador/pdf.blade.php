<form method="POST" action="{{ route('investigador.pdf') }}">
    @csrf
    <div>
        <label for="passaport">Passaport:</label>
        <input type="text" name="passaport" id="passaport" value="{{ old('passaport') }}">
    </div>
    <div>
        <button type="submit">Generar PDF</button>
    </div>
</form>
