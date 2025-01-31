@extends('site.layouts.basico')

@section('conteudo')
    {{ isset($msg) ? $msg : '' }}
    <h2 id="titleLixeira">Dados deletados.</h2>
    <p>Ápos o botão "Deletar" ser precionado, o dado será excluido permanentemente.</p>
    <div class="container">
        <ul class="lista-horizontal">
            <h3>deletados de Bebida</h3>
            @foreach ($bebidasDeletados as $bebidas)
                <li>{{ $bebidas->nome }}</li>
                <form action="{{ route('dados.deletar', ['id' => $bebidas->id, 'type' => 'bebidas']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
                <br>
                <a href="{{ route('dados.restaurar', ['id' => $bebida->id, 'type' => 'bebidas']) }}"><button type="submit">Restaurar</a>
                <br>
            @endforeach
            <h3>deletados de Refeições</h3>
            @foreach ($refeicoesDeletados as $refeicoes)
                <li>{{ $refeicoes->nome }}</li>
                <form action="{{ route('dados.deletar', ['id' => $refeicoes->id, 'type' => 'refeições']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
                <br>
                <a href="{{ route('dados.restaurar', ['id' => $refeicoes->id, 'type' => 'refeições']) }}"><button type="submit">Restaurar</a>
                <br>
            @endforeach
            <h3>deletados de Clientes</h3>
            @foreach ($clientesDeletados as $cliente)
                <li>{{ $cliente->nome }}</li>
                <form action="{{ route('dados.deletar', ['id' => $cliente->id, 'type' => 'clientes']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
                <br>
                <a href="{{ route('dados.restaurar', ['id' => $cliente->id, 'type' => 'clientes']) }}"><button type="submit">Restaurar</a>
                <br>
            @endforeach
        </ul>
    </div>
@endsection