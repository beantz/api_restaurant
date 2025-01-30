<div class="container">
    <h2>Criar {{ $tipo }}</h2>
    <form action="{{ route('create.cardapio', ['tipo' => $tipo]) }}" method="post">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" value="{{old('nome') }}" id="nome" name="nome">
        {{ $errors->has('nome') ? $errors->first('nome') : ''}}
        <br>

        <label for="preço">Preço:</label>
        <input type="text" value="{{ old('preço') }}" id="preço" name="preço">
        {{ $errors->has('preço') ? $errors->first('preço') : ''}}
        <br>
        <button type="submit">Adicionar {{$tipo}}</button>
    </form>
</div>