@extends('layouts.app')

@section('title', 'Nova Reserva')

@section('content')
    <div class="form-reserva">
        <h1>Nova Reserva</h1>
        <p>Preencha os campos abaixo</p>

        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf

            <label for="colaborador">Colaborador:</label>
            <input list="colaboradores" name="colaborador" id="colaborador" required>
            <datalist id="colaboradores">
                @foreach($colaboradores as $colaborador)
                    <option value="{{ $colaborador->nome }}">
                @endforeach
            </datalist>

            <label for="hotel">Hotel:</label>
            <input list="hoteis" name="hotel" id="hotel" required>
            <datalist id="hoteis">
                @foreach($hoteis as $hotel)
                    <option value="{{ $hotel->nome }}">
                @endforeach
            </datalist>

            <label for="cidade">Cidade:</label>
            <input list="cidades" name="cidade" id="cidade" required>
            <datalist id="cidades">
                @foreach($cidades as $cidade)
                    <option value="{{ $cidade->nome }}">
                @endforeach
            </datalist>

            <label for="checkin">Check-in:</label>
            <input type="date" name="checkin" id="checkin" required>

            <label for="checkout">Check-out:</label>
            <input type="date" name="checkout" id="checkout" required>

            <div class="botoes">
                <button type="submit" class="btn-primario">Salvar Reserva</button>
                <button 
                type="button" 
                class="btn-primario" 
                onclick="window.location.href='{{ route('reservas.index') }}'">
                Visualizar Reservas
                </button>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif    
        </form>
    </div>
@endsection
