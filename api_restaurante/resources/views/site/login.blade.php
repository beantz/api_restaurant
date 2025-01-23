@extends('site.layouts.basico')

<div id="forLogin">
    <h2>Login</h2>
    <form action="{{ route('login.post') }}" method="post">
    @csrf  
        <label for="email">E-mail:</label>
        <input type="email" value="{{ old('email') }}" id="email" name="email">
        {{ $errors->has('email') ? $errors->first('email') : '' }}
        
        <label for="senha">Senha:</label>
        <input type="text" value="{{ old('senha') }}" id="senha" name="senha">
        {{ $errors->has('senha') ? $errors->first('senha') : '' }}

        <button type="submit">Acessar</button>
    </form>

    {{ (isset($erro)) && $erro != '' ? $erro : '' }}
</div>