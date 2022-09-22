<template>
	<section class="products section bg-gray">
		<div class="container">
			<div class="row">
				<div class="title text-center">
					<h2>Lista de productos</h2>
				</div>
			</div>
			<div class="row">
				<products-list-item
				v-for="product in products"
				:product="product"
				:key="product.id"
				/>
			</div>
		</div>
	</section>
</template>
<script>
export default{
	mounted() {
		this.$store.dispatch("getProducts");
	},
	computed: {
		products() {
			return this.$store.state.products;
		},
	},
}
</script>