<template>
	<div>
		<section class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content">
							<h1 class="page-name">Checkout</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="container">
			<div class="checkout shopping">
				<h2>Proceder a pagar</h2>
				<div v-for="(errorArray, idx) in errors" :key="idx" class="alert alert-danger" role="alert">
					<div v-for="(allErrors, idx) in errorArray" :key="idx">
						{{ allErrors }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
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
						<form @submit.prevent="storeSale">
							<div class="form-group">
								<label for="full_name">Vendedor</label>
								<input type="text" class="form-control" id="full_name" placeholder="" v-model="currentUser.name" disabled>
							</div>
							<div class="form-group">
								<label for="client">Cliente</label>
								<select class="form-control" v-model="client">
									<option value="0" selected disabled>Seleccione una opcion</option>
									<option v-for="client in clients" :key="client.id" :value="client.id">
										{{ client.name }}
									</option>
								</select>
							</div>
							<div v-if="contado == 'DEUDA'">
								<div class="form-group">
									<label for="deuda">Monto a pagar</label>
									<input type="number" class="form-control" v-model="total">
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-lg">Guardar</button>
						</form>
					</div>
					<div class="col-md-6">
						<h3>Resumen</h3>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="3">Productos</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(item, index) in cart" :key="index">
									<td>{{ item.product.name }}</td>
									<td>x {{ item.quantity }}</td>
									<td>Bs {{ item.quantity * item.product.price }}</td>
								</tr>
							</tbody>
						</table>
						<div class="d-flex justify-content-between align-items-center">
							<h4>Total</h4>
							<h4>Bs {{ cartTotalPrice }}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	mounted(){
		this.redirectIfGuest()

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
			products: [],
			errors:[]
		}
	},
	methods:{
		storeSale(){
			if(this.contado === 'CONTADO'){
				this.status = 'PAGADO'
			}
			let sale = {
				user_id: this.currentUser.id,
				client_id: this.client,
				sale_type: this.contado,
				status: this.status,
				total: this.$store.getters.cartTotalPrice,
				products: this.products,
				
			}
			for(let i = 0; i< this.$store.state.cart.length; i++ ){
				this.products.push({
					product_id: this.$store.state.cart[i].product.id,
					quantity: this.$store.state.cart[i].quantity
				})
			}

			if(this.contado === 'DEUDA'){
				this.status = 'PENDIENTE'
				sale.amount = this.total
			}
			axios.post('/api/sales', sale)
			.then(()=>{
				this.total = 0
				if(this.contado === 'DEUDA'){
					console.log('entro')
					this.$router.push('deudas') 
				}else{
					this.$router.push('mis-ventas')
				}
				sessionStorage.setItem(
					'cart',
					JSON.stringify(this.$store.state.cart = [])
					);
			}).catch(err => {
				this.products = [];
				this.errors = err.response.data.errors
			})
		}
	},
	computed: {
		cart() {
			return this.$store.state.cart;
		},
		cartTotalPrice() {
			return this.$store.getters.cartTotalPrice;
		},
	}
}
</script>