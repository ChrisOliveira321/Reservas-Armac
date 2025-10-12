@extends('layouts.app')

@section('title', 'Lista de Reservas')

@section('content')
<div class="container-reservas">
    <h1>Reservas Cadastradas</h1>

    <div class="botoes-topo">
        <a href="{{ route('reservas.create') }}" class="btn-primario" id="btn-cadastrar">Cadastrar nova reserva</a>
        <button type="button" class="btn-primario" id="btn-atualizar">Atualizar reserva</button>
        <button type="button" class="btn-primario hidden" id="btn-editar">Editar selecionada</button>
        <button type="button" class="btn-secundario hidden" id="btn-cancelar">Cancelar</button>
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
    </form>
</div>

<script>
    const btnAtualizar = document.getElementById('btn-atualizar');
    const btnCadastrar = document.getElementById('btn-cadastrar');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnEditar = document.getElementById('btn-editar');
    const colunasSelecao = document.querySelectorAll('.col-selecao');

    btnAtualizar.addEventListener('click', () => {
        colunasSelecao.forEach(c => c.classList.remove('hidden'));
        btnEditar.classList.remove('hidden');
        btnCancelar.classList.remove('hidden');
        btnAtualizar.classList.add('hidden');
        btnCadastrar.classList.add('hidden');
    });

    btnCancelar.addEventListener('click', () => {
        colunasSelecao.forEach(c => c.classList.add('hidden'));
        btnEditar.classList.add('hidden');
        btnCancelar.classList.add('hidden');
        btnAtualizar.classList.remove('hidden');
        btnCadastrar.classList.remove('hidden');
        document.querySelectorAll('input[name="reserva_id"]').forEach(r => r.checked = false);
    });

    // Clique em EDITAR: redireciona para /reservas/{id}/edit
    btnEditar.addEventListener('click', () => {
        const selecionado = document.querySelector('input[name="reserva_id"]:checked');
        if (!selecionado) {
        alert('Selecione uma reserva para editar.');
        return;
        }
        const id = selecionado.value;
        // redireciona para rota de edição padrão do Laravel
        window.location.href = `/reservas/${id}/edit`;
    });
</script>

@endsection
