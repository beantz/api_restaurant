@extends('site.layouts.basico')

@section('titulo', 'Pesquise por um pedido')

@section('conteudo')
    <div class="container">
        <h3>Pesquise por um pedido que tenha uma refeição ou bebida em específico</h3>
        <form action="{{ route('pegar.pedidos') }}" method="post">
        @csrf
        @method('GET')
            <input type="text" name="search" id="search">

            <button type="submit">Pesquisar</button>
        <form>
    </div>    
@endsection