<template>
    <div>
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            <h1 class="page-name">Iniciar pago</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="checkout shopping">
                <div
                    v-for="(errorArray, idx) in errors"
                    :key="idx"
                    class="alert alert-danger"
                    role="alert"
                >
                    <div v-for="(allErrors, idx) in errorArray" :key="idx">
                        {{ allErrors }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="block billing-details">
                            <h4 class="widget-title">Detalles del pedido</h4>
                            <form class="checkout-form">
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="user_post_code"
                                            >Nombre:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_post_code"
                                            name="zipcode"
                                            :value="currentUser.name"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="user_city"
                                            >Apellido paterno:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_city"
                                            name="city"
                                            :value="
                                                currentUser.profile
                                                    .apellido_paterno
                                            "
                                        />
                                    </div>
                                </div>
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="user_post_code"
                                            >Apellido materno</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_post_code"
                                            name="zipcode"
                                            :value="
                                                currentUser.profile
                                                    .apellido_materno
                                            "
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="user_ci">CI:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_ci"
                                            :value="currentUser.profile.ci"
                                        />
                                    </div>
                                </div>
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="user_phone">Celular:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_phone"
                                            v-model="client.phone"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="user_city">Ciudad</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_city"
                                            name="city"
                                            v-model="client.ciudad"
                                        />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_direccion"
                                        >Direccion</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="user_direccion"
                                        placeholder=""
                                        v-model="client.direccion"
                                    />
                                </div>
                            </form>
                        </div>
                        <div class="block">
                            <h4 class="widget-title">Metodo de pago</h4>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <select
                                        class="form-control"
                                        v-model="sale_type"
                                    >
                                        <option value="CONTADO">CONTADO</option>
                                        <option value="DEUDA">DEUDA</option>
                                    </select>
                                </div>
                            </div>
                            <br />

                            <form @submit.prevent="storeSale">
                                <button
                                    type="submit"
                                    class="btn btn-main mt-20"
                                >
                                    Enviar pedido
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product-checkout-details">
                            <div class="block">
                                <h4 class="widget-title">
                                    Resumen del carrito
                                </h4>
                                <div
                                    class="media product-card"
                                    v-for="(item, index) in cart"
                                    :key="index"
                                >
                                    <a
                                        class="pull-left"
                                        href="product-single.html"
                                    >
                                        <img
                                            :src="`${item.product.image}`"
                                            width="80px"
                                            class="media-object"
                                            alt="Cotton T-shirt"
                                        />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="product-single.html">{{
                                                item.product.name
                                            }}</a>
                                        </h4>
                                        <p class="price">
                                            {{ item.quantity }} x Bs
                                            {{ item.product.price }}
                                        </p>
                                        <p class="price">
                                            Subtotal: Bs
                                            {{
                                                item.quantity *
                                                item.product.price
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <hr />
                                <div class="summary-total">
                                    <span>Total</span>
                                    <span>Bs {{ cartTotalPrice }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.redirectIfGuest();
        this.client.ciudad = this.currentUser.profile.ciudad;
        this.client.phone = this.currentUser.profile.phone;
        this.client.direccion = this.currentUser.profile.direccion;
    },
    data() {
        return {
            sale_type: "CONTADO",
            total: 0,
            contado: "",
            errors: [],
            pedido: {},
            detalle_pedido: [],
            client: { direccion: "", phone: "", ciudad: "" },
        };
    },
    methods: {
        storeSale() {
            let monto_pagado = 0;
            if (this.sale_type == "CONTADO") {
                monto_pagado = this.cartTotalPrice;
            } else {
                monto_pagado = 0;
            }

            this.detalle_pedido = this.cart.map((pedido) => ({
                product_id: pedido.product.id,
                cantidad: pedido.quantity,
            }));
            let order = {
                cliente_id: this.currentUser.id,
                sale_type: this.sale_type,
                total: this.cartTotalPrice,
                pago_deuda: this.total,
                monto_pagado: monto_pagado,
                client: this.client,
                detalle_pedido: this.detalle_pedido,
            };

            axios
                .post("/api/orders", order)
                .then(() => {
                    this.$router.push("orders");
                    sessionStorage.setItem(
                        "cart",
                        JSON.stringify((this.$store.state.cart = []))
                    );
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
    },
    computed: {
        cart() {
            return this.$store.state.cart;
        },
        cartTotalPrice() {
            return this.$store.getters.cartTotalPrice;
        },
    },
};
</script>
