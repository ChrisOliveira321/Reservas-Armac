@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="form-reserva">
        <h1>Login</h1>
        <p>Entre com suas credenciais para acessar o sistema</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">E-mail:</label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username"
            >
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Senha:</label>
            <input 
                id="password" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password"
            >
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="checkbox">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Lembrar de mim</label>
            </div>

            <div class="botoes">
                <button type="submit" class="btn-primario">Entrar</button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link" 
                       style="text-align: center; font-size: 14px; color: #003087; text-decoration: none;">
                       Esqueceu a senha?
                    </a>
                @endif
            </div>
        </form>
    </div>
@endsection
