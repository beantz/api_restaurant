@extends('site.layouts.basico')

@section('titulo', 'Ingredientes')

@section('conteudo')
    <div class="container">
        <div class="ingredientes">
            <h2>Dados Ingredientes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ingrediente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredientes as $ingrediente)
                        <tr>
                            <td>
                                Nome: {{ $ingrediente->nome }}
                            </td>
                        </tr>
                    
                        <tr colspan="2">
                            <td>
                                Refeição:
                                @foreach ($ingrediente->refeições as $refeição)
                                    {{ $refeição->nome}} |
                                @endforeach
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection