@extends('site.layouts.basico')

@section('conteudo')
    {{ isset($msg) ? $msg : '' }}
    <div class="container-totalpedidos">
        <ul class="lista-horizontal">
            <li>
                <h2>Pedidos</h2>
                @foreach ($pedidos as $key => $pedido)
                    pedido número: {{ $key }}
                    {{ $pedido->nome }}
                    {{ $pedido->refeição }}
                    {{ $pedido->bebida }}
                    Nome Cliente: {{ $pedido->cliente->nome }}
                    Cupon: {{ $pedido->cliente->cupon ?? 'não possui' }}
                    Pagamento: {{ $pedido->pagamento->nome }}

                    <button class="btn-editar"><a href={{ route('editar.pedido', ['id' => $pedido->id, 'rota' => 'atualizar.pedido']) }}>Editar</a></button>
                    <button class="btn-deletar"><a href={{ route('deletar.pedido',  ['id' => $pedido->id]) }}>Excluir</a></button>
                    <br>
                @endforeach
            </li>
        </ul>
    </div>
    <div class="paginate">
        {{ $pedidos->links() }}
        {{ $pedidos->firstItem() }} de {{ $pedidos->count() }}
    </div>

@endsection