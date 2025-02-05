@extends('site.layouts.basico')

@section('titulo', 'Editar seu pedido')

@section('conteudo')
    @component('site._components.form_pedidos', ['pagamento' => $pagamento, 'pedidoAnterior' => $pedidoAnterior, 'rota' => 'atualizar.pedido', 'clientes' => $clientes])
        
    @endcomponent
@endsection
