<template>
	<div class="container" id="divID">
		<div class="row">
			<div v-if="sales.length === 0" class="text-center text-muted">
				<h3>Aun no hay ventas realizadas</h3>
			</div>
			<div class="col-md-4" v-for="sale in sales" :key="sale.id">
				<div class="card shadow p-3">
					<div class="card-body">
						<h4><b>Cliente: </b>{{ sale.client_name }}</h4>
						<h4><b>Vendedor: </b>{{ sale.user_name }}</h4>
						<h4><b>Tipo de venta: </b>{{ sale.sale_type }}</h4>
						<h4><b>Estado: </b>{{ sale.status }}</h4>
						<div class="btn-group d-flex justify-content-end">
							<a @click.prevent="showSale(sale)" class="btn btn-info">Ver</a>
							<a @click.prevent="deleteSale(sale)" class="btn btn-danger">Eliminar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<products-modal :sale="sale"></products-modal>
	</div>
</template>
<script>
export default{
	mounted(){
		axios.get('/api/sales')
		.then(res => {
			this.sales = res.data.data
		}).catch(err => {
			console.log(err.response.data)
		})
	},
	data(){
		return{
			sales:[],
			sale:{}
		}
	},
	methods:{
		deleteSale(sale){
			//
		},
		showSale(sale){
			this.sale = sale
			$('#product-modal').modal('show')
		}
	}
}
</script>