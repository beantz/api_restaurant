@extends('site.layouts.basico')

@section('conteudo')
    {{ isset($msg) ? $msg : '' }}
    <div class="container-totalpedidos">
        <ul class="lista-horizontal">
            <li>
                <h2>Pedidos</h2>
                @foreach ($pedidos as $key)
                    pedido número: {{ $key->id }}
                    {{ $key['nome'] }}
                    {{ $key['refeição'] }}
                    {{ $key['bebida'] }}

                    <button class="btn-editar"><a href={{ route('editar.pedido', ['id' => $key->id]) }}>Editar</a></button>
                    <button class="btn-deletar"><a href={{ route('deletar.pedido',  ['id' => $key->id]) }}>Excluir</a></button>
                    <br>
                @endforeach
            </li>
        </ul>
    </div>
    <div class="paginate">
        {{ $pedidos->links() }}
    </div>

@endsection