<!DOCTYPE html>
<html>
<head>
    <title>Index projeto</title>
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center my-4">
                <h1>Gerenciador de Projetos</h1>
                <button type="button" class="btn btn-primary" @click="showModalProjeto">Adicionar projeto</button>
            </div>

            @foreach ($projetos as $projeto)
                <table class="table mb-5">
                    <thead>
                        <tr>
                            <th scope="col">ID Projeto</th>
                            <th scope="col">Nome Projeto</th>
                            <th scope="col">Data Inicio</th>
                            <th scope="col">Data Fim</th>
                            <th scope="col">% Completo</th>
                            <th scope="col">Atrasado</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $projeto->cd_projeto }}</th>
                            <td>{{ $projeto->nm_projeto }}</td>
                            <td>{{ $projeto->data_ini_formatada }}</td>
                            <td>{{ $projeto->data_fim_formatada }}</td>
                            <td>{{ $projeto->percentual_andamento }}%</td>
                            <td>{{ $projeto->atrasado == true ? 'Sim' : 'Não'}}</td>
                            <td class="px-0"><a @click.prevent="showModalProjetoEditar({{ json_encode($projeto) }})"><i class="bi bi-pencil cursor-pointer"></i></a></td>
                            <td class="px-0"><a @click.prevent="openModalExcluirProjeto({{ json_encode($projeto->cd_projeto) }})"><i class="bi bi-trash cursor-pointer"></i></a></td>
                        </tr>
                        @if ($projeto->atividades)
                            <thead>
                                <tr>
                                    <th></th>
                                    <th scope="col">ID Atividade</th>
                                    <th scope="col">Nome Atividade</th>
                                    <th scope="col">Data Inicio</th>
                                    <th scope="col">Data Fim</th>
                                    <th scope="col">Finalizada</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            @foreach ($projeto->atividades as $atividade)
                                <tr>
                                    <th></th>
                                    <td>{{ $atividade->cd_atividade }}</td>
                                    <td>{{ $atividade->nm_atividade }}</td>
                                    <td>{{ $atividade->data_ini_formatada }}</td>
                                    <td>{{ $atividade->data_fim_formatada }}</td>
                                    <td>{{ $atividade->is_finalizada == true ? 'Sim' : 'Não'}}</td>
                                    <td class="px-0"><a @click.prevent="openModalExcluirAtividade({{ json_encode($atividade->cd_atividade) }})"><i class="bi bi-trash cursor-pointer"></i></td>
                                </tr>
                            @endforeach
                        @endif
                </table>
            @endforeach

            <modal-projeto :show="showModal" @close="closeModal"></modal-projeto>
            <modal-projeto-editar :show="showModalEditar" :dados-projeto-edicao="dadosProjetoEdicao" @close="closeModalEditar"></modal-projeto-editar>
            <modal-excluir-projeto :show="showModalExcluirProjeto" :cd-projeto="cd_projeto" @close="closeModalExcluirProjeto"></modal-excluir-projeto>
            <modal-excluir-atividade :show="showModalExcluirAtividade" :cd-atividade="cd_atividade" @close="closeModalExcluirAtividade"></modal-excluir-atividade>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>
