@extends('site.layouts.basico')

@section('titulo', 'Cardápio')

@section('conteudo')
    <br>
    {{ isset($msg) ? $msg : '' }}
    <div class="container">
        <div class="cardapio">
            <h2>Cardápio</h2>
            <h3>Refeições</h3>
            <p>Adicionar nova refeição</p>
            <button class="btn-editar"><a href="{{ route('criar.cardapio', ['tipo' => 'refeição']) }}">Novo</a></button>
            <p>Ingredientes</p>
            <button class="btn-editar"><a href="{{ route('ingredientes.index') }}">Ingredientes</a></button>
            @foreach ($refeições as $key => $refeição)
                <ul>
                    <li>{{ $refeição->nome }} : {{ $refeição->preço }}</li>
                </ul>
                <button class="btn-editar"><a href="{{ route('refeiçãoIngredientes.create', ['id' => $refeição->id]) }}">Adicionar ingrediente</a></button>
                <button class="btn-editar"><a href="{{ route('editar.cardapio', ['id' => $refeição->id, 'tipo' => 'refeição']) }}">Editar</a></button>
                <button class="btn-deletar"><a href="{{ route('delete.cardapio', ['id' => $refeição->id, 'tipo' => 'refeição']) }}">Excluir</a></button>
            @endforeach
            {{ $refeições->links() }}
            <h3>Bebidas</h3>
            <p>Adicionar nova bebida</p>
            <button class="btn-editar"><a href="{{ route('criar.cardapio', ['tipo' => 'bebida']) }}">Novo</a></button>
            @foreach ($bebidas as $key => $bebida)
                <ul>
                    <li>{{ $bebida->nome }} : {{ $bebida->preço }}</li>
                </ul>
                <button class="btn-editar"><a href="{{ route('editar.cardapio', ['id' => $bebida->id, 'tipo' => 'bebida']) }}">Editar</a></button>
                <button class="btn-deletar"><a href="{{ route('delete.cardapio', ['id' => $bebida->id, 'tipo' => 'bebida']) }}">Excluir</a></button>
            @endforeach
            {{ $bebidas->links() }}
        </div>
    </div>    
@endsection