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
                <p class="product-short-description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Rem iusto nihil cum. Illo laborum numquam rem aut officia
                    dicta cumque.
                </p>
                <a href="cart.html" class="btn btn-main">Add To Cart</a>
                <a href="product-single.html" class="btn btn-transparent"
                    >View Product Details</a
                >
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["product"],
};
</script>
