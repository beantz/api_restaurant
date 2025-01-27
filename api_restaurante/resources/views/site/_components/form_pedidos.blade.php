
<div class="formulario">
    <h2>Faça seu pedido</h2>
    <form action="{{ route($rota) }}" method="post">
    @if($rota == 'atualizar.pedido')
        <input type="hidden" name="id" value="{{ $pedidoAnterior->id }}">
    @endif
    @csrf  
        <label for="nome">Nome:</label>
        <input type="text" value="{{ $pedidoAnterior->nome ?? old('nome') }}" id="nome" name="nome">
        {{ $errors->has('nome') ? $errors->first('nome') : ''}}
        <br>
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
        @foreach ($pagamento as $key => $nomePag)

            <option value="{{ $nomePag->id }}" {{ $pedidoAnterior->pagamento_id ?? old('pagamento_id') == $key ? 'selected' : '' }}>{{ $nomePag->nome }}</option>

        @endforeach
        </select>
        <br>
        <button type="submit">Enviar Pedido</button>
    </form>
</div>