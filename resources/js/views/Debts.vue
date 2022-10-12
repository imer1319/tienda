<template>
	<div>
		<section class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content">
							<h1 class="page-name">Ventas a deuda</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div>
			<template v-if="!debts.length">
				<div class="text-center text-muted">
					<h3>Aun no hay ventas realizadas</h3>
				</div>
			</template>
			<template v-if="debts.length">
				<div class="container">
					<div class="row">
						<div class="col-md-4" v-for="(sale, index) in debts" :key="index">
							<div class="card p-3">
								<div class="card-body">
									<h4><b>Cliente: </b>{{ sale.client_name }}</h4>
									<h4><b>Fecha: </b>{{ sale.published_date }}</h4>
									<h4><b>Estado: </b>{{ sale.status }}</h4>
									<h4><b>Tipo de venta: </b>{{ sale.sale_type }}</h4>
									<div class="btn-group d-flex justify-content-end">
										<a @click.prevent="showSale(sale)" class="btn btn-info"><i class="fa fa-eye"></i></a>
										<a @click.prevent="removeSale(sale, index)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</template>
			<products-modal :sale="sale"></products-modal>
		</div>
	</div>
</template>
<script>
export default{
	mounted(){
		this.redirectIfGuest()
		this.$store.dispatch("getDebts");
	},
	data(){
		return{
			sale:{
				products:[],
				debts:[]
			},
		}
	},
	methods:{
		removeSale(sale, index) {
			this.$store.dispatch("removeDebt", {sale, index});
		},
		showSale(sale){
			this.$store.dispatch("getSale", {sale});
			$('#product-modal').modal('show')
		}
	},
	computed: {
		debts() {
			return this.$store.state.debts;
		},
	},
}
</script>