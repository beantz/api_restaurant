@extends('site.layouts.basico')

@section('conteudo')
    @component('site._components.form_pedidos', ['pagamento' => $pagamento, 'pedidoAnterior' => $pedidoAnterior, 'rota' => 'atualizar.pedido'])
        
    @endcomponent
@endsection
