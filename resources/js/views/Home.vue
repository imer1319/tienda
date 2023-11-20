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
                    class="col-md-4"
                />
            </div>
            <pagination
                :current-page="currentPage"
                :total-pages="totalPages"
                @page-change="fetchProducts"
            />
        </div>
    </section>
</template>
<script>
import Pagination from "../components/Pagination.vue";

export default {
    components: {
        Pagination,
    },
    mounted() {
        this.fetchProducts(1);
    },
    methods: {
        fetchProducts(pageNumber) {
            this.$store.dispatch("getProducts", pageNumber);
        },
    },
    computed: {
        products() {
            return this.$store.state.products.data;
        },
        currentPage() {
            return this.$store.state.products.current_page;
        },
        totalPages() {
            return this.$store.state.products.last_page;
        },
    },
};
</script>
