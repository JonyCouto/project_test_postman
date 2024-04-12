<template>
	<v-app>
		<v-main class="app">
			<router-view />
			<Snackbar />
		</v-main>
	</v-app>
</template>

<script lang="ts" setup>
import Snackbar from './components/Snackbar.vue';
</script>

<style lang="scss">
	.app{
		background-color: rgba(40, 40, 40);
		padding: 20px !important;
		box-sizing: border-box;
	}
</style>
