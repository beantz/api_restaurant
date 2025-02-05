@extends('site.layouts.basico')

@section('titulo', 'visualize seu cliente')

@section('conteudo')
    <div class="container">
        <div class="clientes">
            <h2>Dados Cliente</h2>
            <ul>
                <li>Nome: {{ $cliente->nome }}</li>
                <li>CPF: {{ isset($cliente->cpf) ? $cliente->cpf : 'Não possui cpf cadastrado'  }}</li>
                <li>Quantidade de Pedidos: {{ $cliente->quantidade_pedidos }}</li>
                <li>Pedidos Feitos: {{ $cliente->pedidos->refeição }} e {{ $cliente->pedidos->bebida }}</li>
                <li>Cupons: {{ isset($cliente->cupons) ? $cliente->cupons : 'Não possui cupons' }}</li>
            </ul>
        </div>
    </div>
@endsection