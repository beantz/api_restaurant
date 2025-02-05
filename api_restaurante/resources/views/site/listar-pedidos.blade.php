@extends('site.layouts.basico')

@section('titulo', 'Aqui estão os pedidos')

@section('conteudo')
    <div class="container">
        <div class="pedidos">
            <h2>Pedidos</h2>
            @foreach ($pedidos as $key => $pedido)
                <ul>
                    <li>{{ $pedido->id }} : {{ $pedido->refeição }} : {{ $pedido->bebida }}</li>
                </ul>
            @endforeach

            {{ $pedidos->appends($request)->links() }}
    </div>    
@endsection