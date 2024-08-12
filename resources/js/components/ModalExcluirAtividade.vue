<template>
    <div v-if="show" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: lightgray">
                    <h5 class="modal-title">Excluir Atividade</h5>
                    <button type="button" class="btn-close" @click="$emit('close')" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir a atividade?</p>
                </div>
                <div class="modal-footer" style="background-color: black">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')">Fechar</button>
                    <button type="button" class="btn btn-primary" @click="excluirAtividade()">Salvar</button>
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
       cdAtividade: {
           type: Number,
           default: 0,
       },
    },
    methods: {
        close() {
            this.$emit('close');
        },
        excluirAtividade() {
            let url = `${window.origin}/${this.cdAtividade}/excluir-atividade`;
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
