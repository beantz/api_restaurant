
<div class="container">
    <h2>Editar {{ $tipo }}</h2>
    <form action="{{ route('atualizar.cardapio', ['tipo' => $tipo]) }}" method="post">
        <input type="hidden" name="id" value="{{ $data->id }}">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" value="{{ $data->nome ?? old('nome') }}" id="nome" name="nome">
        {{ $errors->has('nome') ? $errors->first('nome') : ''}}
        <br>

        <label for="preço">Preço:</label>
        <input type="text" value="{{ $data->preço ?? old('preço') }}" id="preço" name="preço">
        {{ $errors->has('preço') ? $errors->first('preço') : ''}}
        <br>
        <button type="submit">Atualizar Produto</button>
    </form>
</div>