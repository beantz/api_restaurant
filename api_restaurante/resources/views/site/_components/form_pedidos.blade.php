
<div class="formulario">
    <h2>Faça seu pedido</h2>
    <form action="{{ route($rota) }}" method="post">
    @if($rota == 'atualizar.pedido')
        <input type="hidden" name="id" value="{{ $pedidoAnterior->id }}">
    @endif
    @csrf  
        
        <label for="refeicao">Refeição:</label>
        <input type="text" value="{{ $pedidoAnterior->refeição ?? old('refeição') }}" id="refeição" name="refeição">
        {{ $errors->has('refeição') ? $errors->first('refeição') : ''}}
        <br>
        <label for="bebida">Bebida:</label>
        <input type="text" value="{{ $pedidoAnterior->bebida ?? old('bebida') }}" id="bebida" name="bebida">
        {{ $errors->has('bebida') ? $errors->first('bebida') : ''}}
        <br>

        <label for="pagamento_id">Forma de Pagamento:</label>
        <select id="pagamento_id" name="pagamento_id">
            @foreach ($pagamento as $nomePag)

                <option value="{{ $nomePag->id }}" {{ ($pedidoAnterior->pagamento_id ?? old('pagamento_id')) == $nomePag->id ? 'selected' : '' }}>{{ $nomePag->nome }}</option>

            @endforeach
        </select>
        <br>
        <select id="cliente_id" name="cliente_id">
            <option>-- Insira o nome do cliente --</option>
            @foreach ($clientes as $cliente)

                <option value="{{ $cliente->id }}" {{ ($pedidoAnterior->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>

            @endforeach 
        </select>
        {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}
        <button type="submit">Enviar Pedido</button>
    </form>

</div>