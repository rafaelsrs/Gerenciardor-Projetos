import { createApp } from 'vue';
import ModalProject from './components/ModalProject.vue';
import ModalProjectEdit from './components/ModalProjectEdit.vue';
import ModalExcluirProjeto from './components/ModalExcluirProjeto.vue';
import ModalExcluirAtividade from './components/ModalExcluirAtividade.vue';

import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-icons/font/bootstrap-icons.css';

const app = createApp({
    data() {
        return {
            showModal: false,
            showModalEditar: false,
            showModalExcluirProjeto: false,
            showModalExcluirAtividade: false,
            dadosProjetoEdicao: {},
            cd_projeto: 0,
            cd_atividade: 0
        }
    },
    methods: {
        showModalProjeto() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        },
        showModalProjetoEditar(projeto) {
            this.showModalEditar = true;
            this.dadosProjetoEdicao = projeto;
        },
        closeModalEditar() {
            this.showModalEditar = false;
        },
        openModalExcluirProjeto(cd_projeto) {
            this.showModalExcluirProjeto = true;
            this.cd_projeto = cd_projeto;
        },
        closeModalExcluirProjeto() {
            this.showModalExcluirProjeto = false;
        },
        openModalExcluirAtividade(cd_atividade) {
            this.showModalExcluirAtividade = true;
            this.cd_atividade = cd_atividade;
        },
        closeModalExcluirAtividade() {
            this.showModalExcluirAtividade = false;
        },
    }
});

app.component('modal-projeto', ModalProject);
app.component('modal-projeto-editar', ModalProjectEdit);
app.component('modal-excluir-projeto', ModalExcluirProjeto);
app.component('modal-excluir-atividade', ModalExcluirAtividade);
app.mount('#app');
