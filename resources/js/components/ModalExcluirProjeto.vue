<template>
    <div v-if="show" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Projeto</h5>
                    <button type="button" class="btn-close" @click="$emit('close')" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir o projeto?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')">Close</button>
                    <button type="button" class="btn btn-primary" @click="excluirProjeto()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
   props: {
       show: {
           type: Boolean,
           default: false,
       },
       cdProjeto: {
           type: Number,
           default: 0,
       },
    },
    methods: {
        close() {
            this.$emit('close');
        },
        excluirProjeto() {
            let url = `${window.origin}/${this.cdProjeto}/excluir-projeto`;
            let method = 'DELETE';

            axios({
                method: method,
                url: url,
            }).then(response => {
                    location.assign("/");
                })
            .catch(error => {
                console.log(error);
            });

            this.close();
        },
    }
};
</script>

<style scoped>
.modal {
    /* TODO: Adicionar os estilos no scss */
    display: block; /* Override Bootstrap's default display: none; */
    background-color: rgba(0, 0, 0, 0.5); /* Add a background overlay */
}
</style>
