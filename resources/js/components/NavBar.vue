<template>
    <nav class="navbar navigation">
        <div class="container">
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <router-link :to="{ name: 'home' }">
                            Inicio
                        </router-link>
                    </li>
                    <li v-if="!isAuthenticated">
                        <a href="/login">Iniciar sesión</a>
                    </li>
                    <template v-else>
                        <li
                            class="dropdown"
                            v-if="isAuthenticated && !isClient"
                        >
                            <a href="/home">Ir al panel</a>
                        </li>

                        <li>
                            <router-link :to="{ name: 'sales' }">
                                Pedidos
                            </router-link>
                        </li>

                        <li>
                            <router-link :to="{ name: 'sales' }">
                                Perfil
                            </router-link>
                        </li>
                    </template>

                    <li class="dropdown cart-nav dropdown-slide">
                        <router-link
                            class="dropdown-toggle"
                            data-toggle="dropdown"
                            data-hover="dropdown"
                            :to="{ name: 'cart' }"
                        >
                            <i class="tf-ion-android-cart"></i>
                            <span
                                class="badge badge-primary"
                                v-if="cartItemCount"
                                >{{ cartItemCount }}</span
                            >
                        </router-link>

                        <div class="dropdown-menu cart-dropdown">
                            <template v-if="cartItemCount > 0">
                                <div
                                    class="media"
                                    v-for="item in cart"
                                    :key="item.product.id"
                                >
                                    <a class="pull-left" href="#!">
                                        <img
                                            class="img-fluid"
                                            height="100%"
                                            :src="`${item.product.image}`"
                                            alt="image"
                                        />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="#!">{{
                                                item.product.name
                                            }}</a>
                                        </h4>
                                        <div class="cart-price">
                                            <span>{{ item.quantity }} x</span>
                                            <span>{{
                                                item.product.price
                                            }}</span>
                                        </div>
                                        <h5>
                                            <strong
                                                >Bs
                                                {{
                                                    item.quantity *
                                                    item.product.price
                                                }}</strong
                                            >
                                        </h5>
                                    </div>
                                    <a
                                        @click.prevent="
                                            removeProductFromCart(item.product)
                                        "
                                        class="remove"
                                        ><i class="tf-ion-close"></i
                                    ></a>
                                </div>
                                <div class="cart-summary">
                                    <span>Total</span>
                                    <span class="total-price"
                                        >Bs {{ cartTotalPrice }}</span
                                    >
                                </div>
                                <ul class="text-center cart-buttons">
                                    <li>
                                        <router-link
                                            :to="{ name: 'cart' }"
                                            class="btn btn-small"
                                        >
                                            Carrito
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link
                                            :to="{ name: 'checkout' }"
                                            class="btn btn-small btn-solid-border"
                                        >
                                            Ir a pagar
                                        </router-link>
                                    </li>
                                </ul>
                            </template>
                            <template v-else>
                                <div class="text-center text-muted">
                                    No hay productos en el carrito
                                </div>
                            </template>
                        </div>
                    </li>
                    <li class="dropdown search dropdown-slide open">
                        <a
                            href="#!"
                            class="dropdown-toggle"
                            data-toggle="dropdown"
                            data-hover="dropdown"
                            aria-expanded="true"
                            ><i class="tf-ion-ios-search-strong"></i> Buscar</a
                        >
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="post">
                                    <input
                                        type="search"
                                        class="form-control"
                                        placeholder="Buscar..."
                                    />
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li v-if="isAuthenticated">
                        <a @click="logout" href="#">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            buscar: "",
        };
    },
    computed: {
        cart() {
            return this.$store.state.cart;
        },
        cartItemCount() {
            return this.$store.getters.cartItemCount;
        },
        cartTotalPrice() {
            return this.$store.getters.cartTotalPrice;
        },
    },
    methods: {
        removeProductFromCart(product) {
            this.$store.dispatch("removeProductFromCart", product);
        },
        logout() {
            // Lógica para cerrar sesión
            // Por ejemplo, puedes utilizar el paquete Laravel Passport
            axios
                .post("/logout")
                .then((response) => {
                    window.location.href = "/";
                })
                .catch((error) => {
                    console.error("Error al cerrar sesión:", error);
                });
        },
    },
};
</script>
