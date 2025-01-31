@extends('site.layouts.basico')

@section('conteudo')
    <div class="container">
        <div class="clientes">
            <h2>Todos Clientes</h2>
            <a href="{{ route('cliente.create') }}">Adicionar novo cliente</a>
            @foreach ($clientes as $key => $cliente)
                <ul>
                    <li>{{ $cliente->nome }}
                    <a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a>
                    <br>
                    
                    <form action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Excluir</button>
                    </form>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>    
@endsection