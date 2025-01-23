@extends('site.layouts.basico')

@section('conteudo')
    <div class="container">
        <div class="cardapio">
            <h2>Cardápio</h2>
            <h3>Refeições</h3>
            @foreach ($refeições as $key => $produto)
                <ul>
                    <li>{{ $produto->nome }} : {{ $produto->preço }}</li>
                </ul>
            @endforeach
            <h3>Bebidas</h3>
            @foreach ($bebidas as $key => $produto)
                <ul>
                    <li>{{ $produto->nome }} : {{ $produto->preço }}</li>
                </ul>
            @endforeach
        </div>
        @component('site._components.form_pedidos', ['pagamento' => $pagamento])
        
        @endcomponent
    </div>    
@endsection