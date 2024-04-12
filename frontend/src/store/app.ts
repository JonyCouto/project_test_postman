// Utilities
import { defineStore } from 'pinia'

export const useAppStore = defineStore('app', {
	state: () => ({
		snackbar: {
			active: false,
			msg: ''
		},
		endpoint: 'http://localhost:80/apiPostman/api/routes/products.php',
	}),
	getters:{
		getEndpoint(): string{
			return this.endpoint;
		},
		getSnackbar(){
			return this.snackbar;
		}
	},
	actions: {
		saveMessage(msg: string){
			this.snackbar.active = true;
			this.snackbar.msg = msg;
		}
	}
})
