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
                                        <label for="user_city">CI:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_city"
                                            name="city"
                                            :value="currentUser.profile.ci"
                                        />
                                    </div>
                                </div>
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="user_post_code"
                                            >Celular:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_post_code"
                                            name="zipcode"
                                            :value="currentUser.profile.phone"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="user_city">Ciudad</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_city"
                                            name="city"
                                            :value="currentUser.profile.ciudad"
                                        />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_country">Direccion</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="user_country"
                                        placeholder=""
                                        :value="currentUser.profile.direccion"
                                    />
                                </div>
                            </form>
                        </div>
                        <div class="block">
                            <h4 class="widget-title">Metodo de pago</h4>
                            <div class="contenedor d-flex">
                                <input
                                    type="radio"
                                    id="contado"
                                    name="type_sale"
                                    value="CONTADO"
                                    v-model="contado"
                                />
                                <label class="label-radio" for="contado"
                                    >Contado</label
                                >
                                <input
                                    type="radio"
                                    id="deuda"
                                    value="DEUDA"
                                    name="type_sale"
                                    v-model="contado"
                                />
                                <label class="label-radio" for="deuda"
                                    >Deuda</label
                                >
                            </div>

                            <form @submit.prevent="storeSale">
                                <div v-if="contado == 'DEUDA'">
                                    <div class="form-group">
                                        <label for="deuda">Monto a pagar</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="total"
                                        />
                                    </div>
                                </div>
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
    },
    data() {
        return {
            clients: [],
            contado: "CONTADO",
            client: {},
            total: 0,
            status: "PENDIENTE",
            products: [],
            errors: [],
        };
    },
    methods: {
        storeSale() {
            if (this.contado === "CONTADO") {
                this.status = "PAGADO";
            }
            let sale = {
                user_id: this.currentUser.id,
                client_id: this.client,
                sale_type: this.contado,
                status: this.status,
                total: this.$store.getters.cartTotalPrice,
                products: this.products,
            };
            for (let i = 0; i < this.$store.state.cart.length; i++) {
                this.products.push({
                    product_id: this.$store.state.cart[i].product.id,
                    quantity: this.$store.state.cart[i].quantity,
                });
            }

            if (this.contado === "DEUDA") {
                this.status = "PENDIENTE";
                sale.amount = this.total;
            }
            axios
                .post("/api/sales", sale)
                .then(() => {
                    this.total = 0;
                    if (this.contado === "DEUDA") {
                        console.log("entro");
                        this.$router.push("deudas");
                    } else {
                        this.$router.push("mis-ventas");
                    }
                    sessionStorage.setItem(
                        "cart",
                        JSON.stringify((this.$store.state.cart = []))
                    );
                })
                .catch((err) => {
                    this.products = [];
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
