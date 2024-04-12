<template>
    <v-col cols="10" md="3" class="product">
        <img :src="props.img+randNumb()" :alt="props.name" />
        <h2>{{ props.name }}</h2>
        <h3>R$ {{ ((props.price * quantity) - (props.price * props.discount) * quantity).toFixed(3).slice(0, -1) }}</h3>
        <h4>R$ {{ (props.price * quantity).toFixed(3).slice(0, -1) }}</h4>
        <v-row class="order">
            <v-col cols="12" md="6">
                <v-text-field 
                    v-model="props.quantity" 
                    density="compact" 
                    type="number"
                    hide-details
                    label="Em estoque"
                    readonly
                    >
                </v-text-field>
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field 
                    v-model="quantity" 
                    density="compact" 
                    type="number" 
                    hide-details
                    label="Quantidade a comprar"
                    >
                </v-text-field>
            </v-col>
        </v-row>
        <v-btn @click="buy()" class="btnProduct">Comprar</v-btn>
    </v-col>
</template>

<script setup lang="ts">
import ProductI from '@/interfaces/Product';
import { useAppStore } from '@/store/app';
import { reactive, ref } from 'vue';
const store = useAppStore();
const props = withDefaults(defineProps<ProductI>(), {});
const quantity = ref(1);
async function buy() {
    const formData = new FormData();
    formData.append('id', props.id);
    formData.append('quantity', quantity.value);
    const options = {
        method: 'POST',
        body: formData
    }
    await fetch(store.getEndpoint, options)
        .then(res => res.json())
        .then(res => store.saveMessage(res.msg))
        .catch(err => console.log(err))
};
function randNumb(){
    return `?${Math.random()}`
}
</script>

<style lang="scss">
    .product {
        background: linear-gradient(to bottom, #08248a 50%, #031248);
        border-radius: 10px;
        box-shadow: 3px 4px 5px rgba(15, 15, 15, 0.9);
        margin: 10px;
        padding: 15px;
        font-weight: bold;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: white;
        img {
            width: 100%;
        }
        h4 {
            color: gray;
            font-weight: normal;
            text-decoration: line-through;
        }
        h2, h3, h4{
            margin: 5px;
        }
        .order, .quantity{
            margin: 10px;
        }
        .btnProduct{
            color: black;
        }
    }
</style>
