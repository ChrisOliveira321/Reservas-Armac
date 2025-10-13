@extends('layouts.app')

@section('title', 'Lista de Reservas')

@section('content')
<div class="container-reservas">
    <h1>Reservas Cadastradas</h1>

    <div class="botoes-topo">
        <a href="{{ route('reservas.create') }}" class="btn-primario" id="btn-cadastrar">Cadastrar nova reserva</a>
        <button type="button" class="btn-primario" id="btn-editar-modo">Editar reserva</button>
        <button type="button" class="btn-primario" id="btn-deletar-modo">Deletar reserva</button>

        <!-- Botões que aparecem dinamicamente -->
        <button type="button" class="btn-primario hidden" id="btn-editar">Editar selecionada</button>
        <button type="button" class="btn-perigo hidden" id="btn-confirmar-delete">Confirmar exclusão</button>
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

    <!-- Formulário oculto para deletar -->
    <form id="form-delete" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>

<script>
    const btnEditarModo = document.getElementById('btn-editar-modo');
    const btnDeletarModo = document.getElementById('btn-deletar-modo');
    const btnCadastrar = document.getElementById('btn-cadastrar');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnEditar = document.getElementById('btn-editar');
    const btnConfirmarDelete = document.getElementById('btn-confirmar-delete');
    const colunasSelecao = document.querySelectorAll('.col-selecao');

    function ativarSelecao(tipo) {
        colunasSelecao.forEach(c => c.classList.remove('hidden'));
        btnCancelar.classList.remove('hidden');
        btnCadastrar.classList.add('hidden');
        btnEditarModo.classList.add('hidden');
        btnDeletarModo.classList.add('hidden');

        if (tipo === 'editar') {
            btnEditar.classList.remove('hidden');
        } else if (tipo === 'delete') {
            btnConfirmarDelete.classList.remove('hidden');
        }
    }

    function cancelarSelecao() {
        colunasSelecao.forEach(c => c.classList.add('hidden'));
        btnEditar.classList.add('hidden');
        btnConfirmarDelete.classList.add('hidden');
        btnCancelar.classList.add('hidden');
        btnEditarModo.classList.remove('hidden');
        btnDeletarModo.classList.remove('hidden');
        btnCadastrar.classList.remove('hidden');
        document.querySelectorAll('input[name="reserva_id"]').forEach(r => r.checked = false);
    }

    btnEditarModo.addEventListener('click', () => ativarSelecao('editar'));
    btnDeletarModo.addEventListener('click', () => ativarSelecao('delete'));
    btnCancelar.addEventListener('click', cancelarSelecao);

    btnEditar.addEventListener('click', () => {
        const selecionado = document.querySelector('input[name="reserva_id"]:checked');
        if (!selecionado) {
            alert('Selecione uma reserva para editar.');
            return;
        }
        const id = selecionado.value;
        window.location.href = `/reservas/${id}/edit`;
    });

    btnConfirmarDelete.addEventListener('click', () => {
        const selecionado = document.querySelector('input[name="reserva_id"]:checked');
        if (!selecionado) {
            alert('Selecione uma reserva para excluir.');
            return;
        }
        const id = selecionado.value;
        if (confirm('Tem certeza que deseja excluir esta reserva?')) {
            const formDelete = document.getElementById('form-delete');
            formDelete.action = `/reservas/${id}`;
            formDelete.submit();
        }
    });
</script>

@endsection
