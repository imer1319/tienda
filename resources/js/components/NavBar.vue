<template>
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse text-center">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <router-link :to="{name: 'home'}">
                        Inicio
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'cart'}">
                        Carrito
                    </router-link>
                </li>
                <li>
                    <a href="/login">Login</a>
                </li>

                <li class="dropdown cart-nav dropdown-slide">
                    <router-link
                    class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                    :to="{ name: 'cart' }"
                    >
                    <i class="tf-ion-android-cart"></i>
                    <span class="badge badge-primary" v-if="cartItemCount">{{ cartItemCount }}</span>
                </router-link>

                <div class="dropdown-menu cart-dropdown">
                    <template v-if="cartItemCount > 0">
                        <div class="media" v-for="item in cart" :key="item.product.id">
                            <a class="pull-left" href="#!">
                                <img class="img-fluid" height="100%" :src="`${item.product.image}`" alt="image" />
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="#!">{{ item.product.name }}</a>
                                </h4>
                                <div class="cart-price">
                                    <span>{{ item.quantity }} x</span>
                                    <span>{{ item.product.price }}</span>
                                </div>
                                <h5><strong>${{ item.quantity * item.product.price }}</strong></h5>
                            </div>
                            <a @click.prevent="removeProductFromCart(item.product)" class="remove"><i class="tf-ion-close"></i></a>
                        </div>
                        <div class="cart-summary">
                            <span>Total</span>
                            <span class="total-price">${{ cartTotalPrice }}</span>
                        </div>
                        <ul class="text-center cart-buttons">
                            <li><a href="cart.html" class="btn btn-small">View Cart</a></li>
                            <li><a href="checkout.html" class="btn btn-small btn-solid-border">Checkout</a></li>
                        </ul>
                    </template>
                    <template v-else>
                        <div class="text-center text-muted">
                            No hay productos en el carrito
                        </div>
                    </template>
                </div>
            </li>
        </ul>
    </div>
</div>
</nav>
</template>

<script>
export default {
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
},
}
</script>