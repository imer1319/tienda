<template>
    <div>
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            <h1 class="page-name">Carrito</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <template v-if="!cart.length">
                <h3 class="text-center text-muted">
                    No hay productos en el carrito
                </h3>
            </template>
            <template v-else>
                <div class="card shopping">
                    <div class="row card-body">
                        <div class="col-md-8 border-right">
                            <div class="product-list table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(item, index) in cart"
                                            :key="index"
                                        >
                                            <td>
                                                <div class="d-flex">
                                                    <img
                                                        :src="`${item.product.image}`"
                                                        width="80px"
                                                        class="img-fluid rounded"
                                                        alt="Cotton T-shirt"
                                                    />
                                                    <a
                                                        href="#!"
                                                        class="mx-3 font-weight-bold"
                                                    >
                                                        {{ item.product.name }}
                                                        <div class="text-muted">
                                                            Bs
                                                            {{
                                                                item.product
                                                                    .price
                                                            }}
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-center"
                                                >
                                                    <a
                                                        @click.prevent="
                                                            addQuantityFromProduct(
                                                                item.product
                                                            )
                                                        "
                                                        class="btn btn-sm btn-warning"
                                                        ><b>+</b></a
                                                    >

                                                    <input
                                                        type="number"
                                                        class="form-control-sm text-center"
                                                        min="1"
                                                        v-model="item.quantity"
                                                    />

                                                    <a
                                                        @click.prevent="
                                                            diminishQuantityFromProduct(
                                                                item.product
                                                            )
                                                        "
                                                        class="btn btn-sm btn-warning"
                                                        ><b>-</b></a
                                                    >
                                                </div>
                                            </td>
                                            <td>
                                                Bs
                                                {{
                                                    item.quantity *
                                                    item.product.price
                                                }}
                                            </td>
                                            <td>
                                                <a
                                                    @click.prevent="
                                                        removeProductFromCart(
                                                            item.product
                                                        )
                                                    "
                                                    class="btn btn-danger btn-sm"
                                                    >Remover</a
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div
                                class="h-100 d-flex flex-column justify-content-between"
                            >
                                <div>
                                    <h2 class="text-center">Resumen</h2>
                                    <hr class="my-3" />
                                </div>

                                <div v-for="(item, index) in cart" :key="index" class="d-flex justify-content-between">
                                    <div
                                        class="text-truncate"
                                        style="max-width: 160px"
                                    >
                                        {{ item.product.name }}
                                    </div>
									<div>
										X {{ item.quantity }}
									</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h4 class="text-uppercase">
                                        Items {{ cartItemCount }}
                                    </h4>
                                    <h4>Bs {{ cartTotalPrice }}</h4>
                                </div>
                                <div>
                                    <hr class="my-4" />
                                    <a
                                        @click.prevent="checkout"
                                        class="btn btn-main btn-block"
                                        >Ir a pagar</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        checkout() {
            this.cart.forEach((product) => {
                if (product.quantity > product.product.stock) {
                    product.quantity = product.product.stock;
                }
            });
            sessionStorage.setItem("cart", JSON.stringify(this.cart));
            this.$router.push("checkout");
        },
        removeProductFromCart(product) {
            this.$store.dispatch("removeProductFromCart", product);
        },
        addQuantityFromProduct(product) {
            this.$store.dispatch("addQuantityFromProduct", product);
        },
        diminishQuantityFromProduct(product) {
            this.$store.dispatch("diminishQuantityFromProduct", product);
        },
    },
    computed: {
        cart() {
            return this.$store.state.cart;
        },
        isDisabled() {
            return Boolean(this.$store.state.cart.length);
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
