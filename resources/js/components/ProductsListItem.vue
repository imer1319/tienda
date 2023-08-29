<template>
	<div class="col-xs-6 col-lg-4">
		<div class="product-item">
			<div class="product-thumb">
				<span class="bage">{{ product.category.name }}</span>
				<!-- <img class="img-responsive" :src="`${product.image}`" alt="product-img" /> -->
				<img class="img-responsive" src="/images/reloj.jpg" alt="product-img" />
				<div class="preview-meta">
					<ul>
						<li>
							<span  data-toggle="modal" data-target="#product-modal">
								<i class="tf-ion-ios-search-strong"></i>
							</span>
						</li>
						<li>
							<a href="#!" ><i class="tf-ion-ios-heart"></i></a>
						</li>
						<li>
							<a @click.prevent="addToCart"><i class="tf-ion-android-cart"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="product-content">
				<h4><a :href="`{{ product.slug }}`">{{ product.name }}</a></h4>
				<p class="price">${{ product.price }}</p>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	props:['product'],
	methods:{
		addToCart(){
			this.$store.dispatch('addProductToCart',{
				product: this.product,
				quantity: 1
			})
		}
	}
}
</script>