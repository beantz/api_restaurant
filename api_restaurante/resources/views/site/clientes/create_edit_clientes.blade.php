<div class="container">
    @if(isset($cliente->id))
        <h2>Atualizar dados de cliente</h2>
        <form action="{{ route('cliente.update', $cliente) }}" method="post">
        @method('PUT')
        @csrf
    @else
        <h2>Realizar cadastramento</h2>
        <form action="{{ route('cliente.store') }}" method="post">
        @csrf
    @endif
   
        <label for="nome">Nome:</label>
        <input type="text" value="{{$cliente->nome ?? old('nome') }}" id="nome" name="nome">
        {{-- {{ $errors->has('nome') ? $errors->first('nome') : ''}} --}}
        <br>

        <label for="cpf">CPF:</label>
        <input type="number" value="{{$cliente->cpf ?? old('cpf') }}" id="cpf" name="cpf" placeholder="000.000.000-00">
        {{-- {{ $errors->has('preço') ? $errors->first('preço') : ''}} --}}
        <br>

        <label for="quantidade_pedidos">Quantidade de Pedidos:</label>
        <input type="number" value="{{ $cliente->quantidade_pedidos ?? old('quantidade_pedidos') }}" id="quantidade_pedidos" name="quantidade_pedidos">
        <br>

        <label for="Cupons">Cupons:</label>
        <input type="number" value="{{ $cliente->cupons ?? old('Cupons') }}" id="Cupons" name="Cupons">
        <br>

        <button type="submit">Cadastrar</button>
    </form>
</div>