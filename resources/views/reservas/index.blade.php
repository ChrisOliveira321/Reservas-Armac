@extends('layouts.app')

@section('title', 'Lista de Reservas')

@section('content')
<div class="container-reservas">
    <h1>Reservas Cadastradas</h1>

    <div class="botoes-topo">
        <a href="{{ route('reservas.create') }}" class="btn-primario">Cadastrar nova reserva</a>
        <button type="button" class="btn-primario" id="btn-atualizar">Atualizar reserva</button>
    </div>

    <form id="form-selecao">
        <table class="tabela-reservas">
            <thead>
                <tr>
                    <th class="col-selecao hidden">Selecionar</th>
                    <th>ID</th>
                    <th>Colaborador</th>
                    <th>Hotel</th>
                    <th>Cidade</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td class="col-selecao hidden">
                            <input type="radio" name="reserva_id" value="{{ $reserva->id }}">
                        </td>
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

        {{-- Botões de edição ocultos inicialmente --}}
        <div id="botoes-edicao" class="hidden">
            <button type="submit" class="btn-primario">Editar selecionada</button>
            <button type="button" class="btn-secundario" id="btn-cancelar">Cancelar</button>
        </div>
    </form>
</div>

<script>
    const btnAtualizar = document.getElementById('btn-atualizar');
    const btnCancelar = document.getElementById('btn-cancelar');
    const colunasSelecao = document.querySelectorAll('.col-selecao');
    const botoesEdicao = document.getElementById('botoes-edicao');
    const formSelecao = document.getElementById('form-selecao');

    // Clicar em "Atualizar reserva" → mostra seleção e botões
    btnAtualizar.addEventListener('click', () => {
        colunasSelecao.forEach(c => c.classList.remove('hidden'));
        botoesEdicao.classList.remove('hidden');
        btnAtualizar.classList.add('hidden');
    });

    // Clicar em "Cancelar" → volta tudo ao normal
    btnCancelar.addEventListener('click', () => {
        colunasSelecao.forEach(c => c.classList.add('hidden'));
        botoesEdicao.classList.add('hidden');
        btnAtualizar.classList.remove('hidden');
        document.querySelectorAll('input[name="reserva_id"]').forEach(r => r.checked = false);
    });

    // Submeter o formulário → redireciona para o edit da reserva selecionada
    formSelecao.addEventListener('submit', e => {
    e.preventDefault();
    const selecionado = document.querySelector('input[name="reserva_id"]:checked');
    if (!selecionado) {
        alert('Selecione uma reserva para editar.');
        return;
    }
    const id = selecionado.value;

    // Rota de edit CORRETA
    const url = "{{ route('reservas.edit', ':id') }}".replace(':id', id);
    window.location.href = url;
});



</script>

<style>
.hidden {
    display: none !important;
}

.botoes-topo {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 20px;
}

.tabela-reservas {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 0 6px rgba(0,0,0,0.1);
}

th, td {
    padding: 10px 15px;
    text-align: center;
}

th {
    background-color: #0d47a1;
    color: white;
}

tr:nth-child(even) {
    background-color: #f8f9fa;
}

#botoes-edicao {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

.btn-secundario {
    background-color: #777;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 8px 16px;
    cursor: pointer;
}
</style>
@endsection
