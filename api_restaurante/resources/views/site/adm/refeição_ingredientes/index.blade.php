@extends('site.layouts.basico')

@section('titulo', 'Refeição')

@section('conteudo')
    <div class="container">
        <div class="refeição">
            <h2>Dados Refeição</h2>
            <ul>
                <li>Nome: {{ $refeição->nome }}</li>
                <li>Preço: {{ $refeição->preço }}</li>
                @foreach ($refeição->ingredientes as $ingrediente)
                    <li>Ingredientes: {{ $ingrediente->nome }}</li>
                    <li>Data de cadastramento: {{ $ingrediente->pivot->created_at->format('d/m/Y') }}</li>
                @endforeach
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

                    <input type="number" name="quantidade" value="{{ old('quantidade') ? old('quantidade') : ''}}" placeholder="Insira a quantidade do produto">
                    {{ $errors->has('quantidade') ? $errors->first('quantidade') : ''}}

                    <button type="submit">Cadastrar</button>
                </form>    
            </ul>
        </div>
    </div>
@endsection