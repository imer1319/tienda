<template>
	<div class="container">
		<template v-if="cart.length > 0">
			<div class="cart shopping">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="d-flex align-items-center justify-content-between">
								<h2>Carrito</h2>
								<h4>Items {{ cartItemCount }}</h4>
							</div>
							<div class="block">
								<div class="product-list table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Cantidad</th>
												<th>Subtotal</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="(item, index) in cart" :key="index">
												<td>
													<div class="d-flex">
														<img
														:src="`${item.product.image}`"
														width="80px"
														class="img-fluid rounded" alt="Cotton T-shirt">
														<a href="#!" class="mx-3 font-weight-bold">
															{{ item.product.name }}
															<div class="text-muted">$ {{ item.product.price }}</div>
														</a>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<a @click.prevent="addQuantityFromProduct(item.product)" class="btn btn-sm btn-primary">+</a>

														<input type="number" class="form-control-sm" min="1" v-model="item.quantity">
														
														<a @click.prevent="diminishQuantityFromProduct(item.product)" class="btn btn-sm btn-primary">-</a>
													</div>
												</td>
												<td>$ {{ item.quantity * item.product.price }}</td>
												<td>
													<a @click.prevent="removeProductFromCart(item.product)" class="product-remove"
													>Remover</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-4 bg-gray">
							<h2>Resumen</h2>
							<hr class="my-3">
							<div class="d-flex justify-content-between mb-4">
								<h4 class="text-uppercase">Items {{ cartItemCount }}</h4>
								<h4>$ {{ cartTotalPrice }}</h4>
							</div>

							<h5 class="text-uppercase mb-3">Give code</h5>

							<div class="mb-5">
								<div class="form-outline">
									<input type="text" id="form3Examplea2" class="form-control form-control-lg" />
									<label class="form-label" for="form3Examplea2">Enter your code</label>
								</div>
							</div>

							<hr class="my-4">

							<div class="d-flex justify-content-between mb-5">
								<h5 class="text-uppercase">Total price</h5>
								<h5>€ 137.00</h5>
							</div>
							<router-link :to="{name: 'home'}" class="btn btn-block btn-primary">
								Seguir comprando
							</router-link>
							<router-link :to="{name: 'checkout'}" class="btn btn-block btn-primary">
								Ir a pagar
							</router-link>
						</div>
					</div>
				</div>
			</div>
		</template>

		<template v-else>
			<div class="card">
				<div class="card-body text-center text-muted">
					<h4>No hay productos en el carrito</h4>
				</div>
			</div>
		</template>
	</div>
</template>
<script>
export default {
	data() {
		return {

		}
	},
	methods: {
		removeProductFromCart(product) {
			this.$store.dispatch("removeProductFromCart", product);
		},
		addQuantityFromProduct(product){
			this.$store.dispatch("addQuantityFromProduct", product);
		},
		diminishQuantityFromProduct(product){
			this.$store.dispatch("diminishQuantityFromProduct", product);
		}
	},
	computed: {
		cart() {
			return this.$store.state.cart;
		},
		isDisabled(){
			return Boolean(this.$store.state.cart.length)
		},
		cartItemCount() {
			return this.$store.getters.cartItemCount;
		},
		cartTotalPrice() {
			return this.$store.getters.cartTotalPrice;
		},
	},
};
</script>
