<template>
	<div class="container">
		<div class="checkout shopping">
			<h2>Proceder a pagar</h2>
			<div class="row">
				<div class="contenedor d-flex">
					<input
					type="radio"
					id="contado"
					name="type_sale"
					value="CONTADO"
					v-model="contado"
					>
					<label class="label-radio" for="contado">Contado</label>
					<input 
					type="radio" 
					id="deuda"
					value="DEUDA"
					name="type_sale"
					v-model="contado"
					>
					<label class="label-radio" for="deuda">Deuda</label>
				</div>
			</div>
			<form @submit.prevent="storeSale">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="full_name">Vendedor</label>
							<input type="text" class="form-control" id="full_name" placeholder="" v-model="currentUser.name" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="client">Cliente</label>
							<select class="form-control" v-model="client">
								<option value="0" selected disabled>Seleccione una opcion</option>
								<option v-for="client in clients" :key="client.id" :value="client.id">
									{{ client.name }}
								</option>
							</select>
						</div>
					</div>
				</div>
				<div v-if="contado == 'DEUDA'">
					<div class="form-group">
						<label for="deuda">Monto a pagar</label>
						<input type="number" class="form-control" v-model="total">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</template>
<script>
export default {
	mounted(){
		this.redirectIfGuest();

		axios.get('/api/clients-all')
		.then(res =>{
			this.clients = res.data
		}).catch(err =>{
			console.log(err.response.data)
		})
	},
	data(){
		return {
			clients:[],
			contado:'CONTADO',
			client:{},
			total:0,
			status:'PENDIENTE',
			products: []
		}
	},
	methods:{
		storeSale(){
			for(let i = 0; i< this.$store.state.cart.length; i++ ){
				this.products.push({
					product_id: this.$store.state.cart[i].product.id,
					quantity: this.$store.state.cart[i].quantity
				})
			}

			if(this.contado === 'CONTADO'){
				this.status = 'PAGADO'
				this.total = this.$store.getters.cartTotalPrice;
			}else{
				this.status = 'PENDIENTE'
			}
			axios.post('/api/sales', {
				user_id: this.currentUser.id,
				client_id: this.client,
				sale_type: this.contado,
				status: this.status,
				total: this.total,
				products: this.products
			})
			.then(()=>{
				sessionStorage.setItem('cart', JSON.stringify(this.$store.state.cart = []));
			}).catch(err => {
				console.log(err.response.data)
			})
		}
	}
}
</script>