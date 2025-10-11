@extends('layouts.app')

@section('title', 'Lista de Reservas')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/reservas-index.css') }}">
@endsection

@section('content')
<main>
    <div class="container">
        <h1>Reservas Cadastradas</h1>

        <a href="{{ route('reservas.create') }}" class="btn-nova">Cadastrar nova reserva</a>

        <!-- Filtros -->
        <!-- <form method="GET" action="{{ route('reservas.index') }}" class="filtros-form" style="margin-bottom:20px;">
            <div class="filtros-grid">
                <input type="text" name="colaborador" placeholder="Colaborador" value="{{ request('colaborador') }}">
                <input type="text" name="hotel" placeholder="Hotel" value="{{ request('hotel') }}">
                <input type="text" name="cidade" placeholder="Cidade" value="{{ request('cidade') }}">
                <input type="date" name="checkin" value="{{ request('checkin') }}">
                <input type="date" name="checkout" value="{{ request('checkout') }}">
                <button type="submit" class="btn-filtrar">Filtrar</button>
                <a href="{{ route('reservas.index') }}" class="btn-limpar">Limpar</a>
            </div>
        </form> -->

        @if($reservas->isEmpty())
            <p class="sem-reserva">Nenhuma reserva encontrada.</p>
        @else
            <table class="tabela-reservas" id="tabela-reservas">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Colaborador</th>
                        <th>Hotel</th>
                        <th>Cidade</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->id }}</td>
                            <td>{{ $reserva->colaborador }}</td>
                            <td>{{ $reserva->hotel }}</td>
                            <td>{{ $reserva->cidade }}</td>
                            <td>{{ $reserva->checkin }}</td>
                            <td>{{ $reserva->checkout }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</main>
@endsection
