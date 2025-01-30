@extends('site.layouts.basico')

@section('conteudo')
    <div class="container">
        <div class="clientes">
            <h2>Dados Cliente</h2>
            <ul>
                <li>Nome: {{ $cliente->nome }}</li>
                <li>CPF: {{ isset($cliente->cpf) ? $cliente->cpf : 'Não possui cpf cadastrado'  }}</li>
                <li>Quantidade de Pedidos: {{ $cliente->quantidade_pedidos }}</li>
                <li>Cupons: {{ isset($cliente->cupons) ? $cliente->cupons : 'Não possui cupons' }}</li>
            </ul>
        </div>
    </div>    
@endsection