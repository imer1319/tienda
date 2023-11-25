<template>
    <div class="product-item">
        <div class="product-thumb">
            <a
                @click.prevent="getProductsCategory(1, product.category.id)"
                class="bage cursor-pointer"
                >{{ product.category.name }}</a
            >
            <img :src="`${product.image}`" alt="product-img" />
            <div class="preview-meta">
                <ul>
                    <li>
                        <a
                            @click.prevent="showProductModal"
                        >
                            <i class="tf-ion-ios-search-strong"></i>
                        </a>
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
            this.$store.dispatch("getProductsCategory", {
                pageNumber,
                category,
            });
        },
        showProductModal() {
            this.$store.dispatch("getProduct", { product: this.product });
            this.$emit("show-modal-product");
        },
    },
};
</script>
