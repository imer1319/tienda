<template>
    <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="modal-image">
                <img :src="`${product.image}`" alt="product-img" />
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="product-short-details">
                <h2 class="product-title">{{ product.name }}</h2>
                <p class="product-price">Bs {{ product.price }}</p>
                <a @click.prevent="addToCart"class="btn btn-main">Añadir al carro</a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["product"],
    methods: {
        addToCart() {
            this.$store.dispatch("addProductToCart", {
                product: this.product,
                quantity: 1,
            });
        },
    },
};
</script>
