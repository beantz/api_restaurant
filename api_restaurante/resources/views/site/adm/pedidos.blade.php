@extends('site.layouts.basico')

@section('conteudo')
    {{ isset($msg) ? $msg : '' }}
    <div class="container-totalpedidos">
        <ul class="lista-horizontal">
            <li>
                <h2>Pedidos</h2>
                @foreach ($pedidos as $key => $ped)
                    pedido número: {{ $key }}
                    {{ $ped->nome }}
                    {{ $ped->refeição }}
                    {{ $ped->bebida }}
                    Nome Cliente: {{ $ped->cliente->nome }}
                    Cupon: {{ $ped->cliente->cupon ?? 'não possui' }}

                    <button class="btn-editar"><a href={{ route('editar.pedido', ['id' => $key, 'rota' => 'atualizar.pedido']) }}>Editar</a></button>
                    <button class="btn-deletar"><a href={{ route('deletar.pedido',  ['id' => $key]) }}>Excluir</a></button>
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