@extends('site.layouts.basico')

@section('conteudo')
    <div class="container">
        <div class="clientes">
            <h2>Todos Clientes</h2>
            @foreach ($clientes as $key => $cliente)
                <ul>
                    <li>{{ $cliente->nome }}
                    <form action="{{ route('cliente.edit', $cliente->id) }}" method="post">
                        @csrf
                        <a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a>
                    </form>
                    <br>
                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('cliente.destroy', $cliente->id) }}">Excluir</a>
                    </form>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>    
@endsection