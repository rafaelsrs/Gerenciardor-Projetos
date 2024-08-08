<template>
    <div v-if="show" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: gray;">
                    <h5 class="modal-title">Editar Projeto</h5>
                  <button type="button" class="btn-close" @click="$emit('close')" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h2>Projeto</h2>

                            <div class="form-group mb-2">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" v-model="dadosProjetoEdicao.nm_projeto">
                            </div>

                            <div class="form-group mb-2">
                                <label for="name">Data Início</label>
                                <input type="date" class="form-control" max="9999-12-31" v-model="dadosProjetoEdicao.data_ini">
                            </div>

                             <div class="form-group mb-2">
                                <label for="name">Data Fim</label>
                                <input type="date" class="form-control" max="9999-12-31" v-model="dadosProjetoEdicao.data_fim">
                            </div>
                        </div>
                        <div class="col-12">

                            <div class="form-group mb-2">
                                <h2>Atividades</h2>
                                <button class="btn btn-primary" @click="adicionarAtividade()">Adicionar Atividade</button>
                            </div>

                            <div v-for="(atividade, idxAtividade) in getAtividades">

                                <div v-if="!atividade.deleted" class="d-flex mb-2">
                                    <div class="form-group mx-2">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control" v-model="atividade.nm_atividade">
                                    </div>

                                    <div class="form-group mx-2">
                                        <label for="name">Data Início</label>
                                        <input type="date" class="form-control" max="9999-12-31" v-model="atividade.data_ini">
                                    </div>

                                    <div class="form-group mx-2">
                                        <label for="name">Data Fim</label>
                                        <input type="date" class="form-control" max="9999-12-31" v-model="atividade.data_fim">
                                    </div>

                                    <div class="form-check mx-2 mt-4 py-2">
                                        <input class="form-check-input" type="checkbox" v-model="atividade.is_finalizada" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault"> Finalizada </label>
                                    </div>

                                    <div class="mt-4 py-2">
                                        <a @click="removerAtividade(idxAtividade)">
                                            <i class="bi bi-trash cursor-pointer"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: black;">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')">Close</button>
                    <button type="button" class="btn btn-primary" @click="salvarprojeto()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
                <strong class="mr-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>-->
</template>

<script>

const modeloAtividade = {
    nm_atividade: '',
    data_ini: '',
    data_fim: '',
    is_finalizada: false,
};

import axios from 'axios';

export default {
    props: {
        show: {
            type: Boolean,
            default: false,
        },
        dadosProjetoEdicao: {
            type: Object,
            default: () =>  ({})
        }
    },
    methods: {
        close() {
            this.$emit('close');
        },
        salvarprojeto() {
            const data = JSON.parse(JSON.stringify(this.dadosProjetoEdicao));
            let idProjeto = this.dadosProjetoEdicao.cd_projeto;
            let url = `${window.origin}/${idProjeto}/editar`;
            let method = 'PUT';

            axios({
                method: method,
                url: url,
                data: data,
            }).then(response => {
                        location.assign("/");
                    })
            .catch(error => {
                console.log(error);
            });
            this.close();
        },
        adicionarAtividade() {
            const modeloAtividades = JSON.parse(JSON.stringify(modeloAtividade));
            this.dadosProjetoEdicao.atividades.push(modeloAtividades);
        },
        removerAtividade(idxAtividade) {
            if(this.dadosProjetoEdicao.atividades[idxAtividade].cd_atividade){
                this.dadosProjetoEdicao.atividades[idxAtividade].deleted = true;
            }else{
                this.dadosProjetoEdicao.atividades.splice(idxAtividade, 1);
            }
        },
    },
    computed: {
        getAtividades() {
            return this.dadosProjetoEdicao.atividades;
        },
    },
};
</script>

<style scoped>
.modal {
    display: block; /* Override Bootstrap's default display: none; */
    background-color: rgba(0, 0, 0, 0.5); /* Add a background overlay */
}
.cursor-pointer {
    cursor: pointer;
}
</style>
