<template>
	<v-container-fluid>
		<v-row class="container">
			<Product v-for="el in this.items"
				:key="el.id"
				:id="el.id"
				:discount="el.discount"
				:img="el.img"
				:name="el.name"
				:quantity="el.quantity"
				:price="el.price"
			></Product>
		</v-row>
	</v-container-fluid>
</template>

<script lang="ts">
	import Product from '@/components/Product.vue';
	import ProductI from '@/interfaces/Product';
	import {useAppStore} from '@/store/app';
	const store = useAppStore();
	export default{
		data: function(){
			return {
				items: []
			}
		},
		components: {
			Product
		},
		async beforeMount(){
			const options = {
				method: 'GET'
			};
			await fetch(store.getEndpoint, options)
				.then(res => res.json())
				.then(res => res.forEach((el: ProductI) => {
					this.items.push(el);
				}))
				.catch(err => console.log(err))
		}
	}
</script>

<style lang="scss">
	.container{
		justify-content: center;
	}
</style>