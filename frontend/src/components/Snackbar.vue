<template>
    <div class="text-center">
        <v-snackbar v-model="snackbar.active" multi-line>
            {{ snackbar.msg }}
            <v-btn @click="snackbar.active = false" class="btn">Fechar</v-btn>
        </v-snackbar>
    </div>
</template>

<script lang="ts" setup>
import {reactive} from 'vue';
import { useAppStore } from '@/store/app';
const store = useAppStore();
const snackbar = reactive(store.getSnackbar);
</script>

<style>
.v-snackbar__content{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.btn{
    background-color: #274287 !important;
    color: white;
    margin-left: 10px;
}
</style>