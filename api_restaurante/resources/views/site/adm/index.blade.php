@extends('site.layouts.basico')

@section('conteudo')
    <div class="container">
    <h2>Ola Adm!<h2>
    <p>O que você deseja acessar?</p>
    <ul class="lista-horizontal">
        <li>
            <button><a href="{{ route('adm.pedidos') }}">Pedidos</a></button>
        </li>
        <li>
            <button><a href="{{ route('adm.cardapio') }}">Cardápio</a></button>
        </li>
        <li>
            <button><a href="{{ route('adm.clientes') }}">Clientes</a></button>
        </li>
    </ul>
@endsection