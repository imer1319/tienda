<template>
    <section class="products section">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Lista de productos</h2>
                </div>
            </div>
            <div class="my-grid-container">
                <products-list-item
                    v-for="product in products"
                    :product="product"
                    :key="product.id"
                    @show-modal-product="showProductModal"
                />
            </div>
            <pagination
                :current-page="currentPage"
                :total-pages="totalPages"
                @page-change="getProducts"
                @page-change-category="getProductsCategory"
            />
            <Modal>
                <ProductItem
                    :product="product"
                />
            </Modal>
        </div>
    </section>
</template>
<script>
import Pagination from "../components/Pagination.vue";
import Modal from "../components/Modal.vue";
import ProductItem from "../components/ProductItem.vue";

export default {
    components: {
        Pagination,
        Modal,
        ProductItem,
    },
    mounted() {
        this.getProducts(1);
    },
    methods: {
        getProducts(pageNumber) {
            this.$store.dispatch("getProducts", pageNumber);
        },
        getProductsCategory(pageNumber) {
            this.$store.dispatch("getProductsCategory", {
                page: pageNumber,
                category: this.categoria,
            });
        },
        showProductModal() {
            $("#product-modal").modal("show");
        },
    },
    computed: {
        products() {
            return this.$store.state.products.data;
        },
        product() {
            return this.$store.state.product;
        },
        currentPage() {
            return this.$store.state.products.current_page;
        },
        totalPages() {
            return this.$store.state.products.last_page;
        },
        categoria() {
            return this.$store.state.categoria;
        },
    },
};
</script>
