<template>
    <div class="product-item">
        <div class="product-thumb">
            <a
                @click.prevent="getProductsCategory(1,product.category.id)"
                class="bage cursor-pointer"
                >{{ product.category.name }}</a
            >
            <!-- <img class="img-responsive" :src="`${product.image}`" alt="product-img" /> -->
            <img width="100%" src="/images/reloj.jpg" alt="product-img" />
            <div class="preview-meta">
                <ul>
                    <li>
                        <span data-toggle="modal" data-target="#product-modal">
                            <i class="tf-ion-ios-search-strong"></i>
                        </span>
                    </li>
                    <li>
                        <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                    </li>
                    <li>
                        <a @click.prevent="addToCart"
                            ><i class="tf-ion-android-cart"></i
                        ></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-content">
            <h4>
                <a :href="`{{ product.slug }}`">{{ product.name }}</a>
            </h4>
            <p class="price">Bs {{ product.price }}</p>
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
        getProductsCategory(pageNumber, category) {
            this.$store.dispatch("getProductsCategory", { pageNumber, category });
        },
    },
};
</script>
