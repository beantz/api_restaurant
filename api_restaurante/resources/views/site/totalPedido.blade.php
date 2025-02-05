@extends('site.layouts.basico')

@section('titulo', 'Total do seu pedido')

@section('conteudo')
    <h2>Ola {{ $nome }}, este é o seu pedido</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome Cliente</th>
            <th>Refeição</th>
            <th>Bebida</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>{{ $id }}</td>
            <td>{{ $nome }}</td>
            <td>{{ $comida }}</td>
            <td>{{ $bebida }}</td>
            <td>{{ $total }}</td>
        </tr>
    </table>

@endsection