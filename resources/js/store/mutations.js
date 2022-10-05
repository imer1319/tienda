export const SET_PRODUCTS = (state, products) => {
    state.products = products
}

export const SET_PRODUCT = (state, product) => {
    state.product = product;
}

export const ADD_TO_CART = (state, { product, quantity }) => {
    let productInCart = state.cart.find(item => {
        return item.product.id === product.id
    })

    if (productInCart) {
        productInCart.quantity += quantity;
        // if(){
        //     axios.post('/api/carts', {
        //         user_id:
        //     })
        // }
        sessionStorage.setItem('cart', JSON.stringify(state.cart));
        return;
    }

    state.cart.push({ product, quantity })
    sessionStorage.setItem('cart', JSON.stringify(state.cart));
}

export const REMOVE_PRODUCT_FROM_CART = (state, product) => {
    state.cart = state.cart.filter(item => {
        return item.product.id !== product.id
    })
    sessionStorage.setItem('cart', JSON.stringify(state.cart));
}

export const ADD_QUANTITY_FROM_PRODUCT = (state, product) => {
    let productInCart = state.cart.find(item => {
        return item.product.id === product.id
    })
    productInCart.quantity++
    sessionStorage.setItem('cart', JSON.stringify(state.cart));
}

export const DIMINISH_QUANTITY_FROM_PRODUCT = (state, product) => {
    let productInCart = state.cart.find(item => {
        return item.product.id === product.id
    })
    
    productInCart.quantity--

    if(productInCart.quantity < 1){
        productInCart.quantity = 1
    }
    sessionStorage.setItem('cart', JSON.stringify(state.cart));
}