@extends('site.layouts.basico')

@section('titulo', 'Refeição')

@section('conteudo')
    <div class="container">
        <div class="refeição">
            <h2>Dados Refeição</h2>
            <ul>
                <li>Nome: {{ $refeição->nome }}</li>
                <li>Preço: {{ $refeição->preço }}</li>
                <li>Ingredientes: {{ $refeição->ingredientes }}</li>
                <br>

                <form action="{{ route('refeiçãoIngredientes.store') }}" method="post">
                   <input type="hidden" name="refeição_id" value="{{ $refeição->id }}">
                @csrf
                    <select name="ingredientes_id">
                        <option>-- Selecione o ingrediente --</option>

                        @foreach ($ingredientes as $ingrediente)
                            <option value="{{ $ingrediente->id }}">{{ $ingrediente->nome }}</option>
                        @endforeach                
                    </select>
                    {{ $errors->has('ingredientes_id') ? $errors->first('ingredientes_id') : ''}}

                    <button type="submit">Cadastrar</button>
                </form>    
            </ul>
        </div>
    </div>
@endsection