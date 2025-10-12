@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
<div class="form-reserva">
    <h1>Editar Reserva</h1>
    <p>Atualize os campos abaixo e salve a reserva</p>

    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="colaborador">Colaborador:</label>
        <input list="colaboradores" name="colaborador" id="colaborador" value="{{ old('colaborador', $reserva->colaborador) }}" required>
        <datalist id="colaboradores">
            @foreach($colaboradores as $colaborador)
                <option value="{{ $colaborador->nome }}">
            @endforeach
        </datalist>

        <label for="hotel">Hotel:</label>
        <input list="hoteis" name="hotel" id="hotel" value="{{ old('hotel', $reserva->hotel) }}" required>
        <datalist id="hoteis">
            @foreach($hoteis as $hotel)
                <option value="{{ $hotel->nome }}">
            @endforeach
        </datalist>

        <label for="cidade">Cidade:</label>
        <input list="cidades" name="cidade" id="cidade" value="{{ old('cidade', $reserva->cidade) }}" required>
        <datalist id="cidades">
            @foreach($cidades as $cidade)
                <option value="{{ $cidade->nome }}">
            @endforeach
        </datalist>

        <label for="checkin">Check-in:</label>
        <input type="date" name="checkin" id="checkin" value="{{ old('checkin', $reserva->checkin) }}" required>

        <label for="checkout">Check-out:</label>
        <input type="date" name="checkout" id="checkout" value="{{ old('checkout', $reserva->checkout) }}" required>

        <div class="botoes">
            <button type="submit" class="btn-primario">Salvar Reserva</button>
            <button type="button" class="btn-secundario" onclick="window.location.href='{{ route('reservas.index') }}'">
                Voltar
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif  

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  
    </form>
</div>
@endsection
