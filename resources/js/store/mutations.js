export const SET_PRODUCTS = (state, products) => {
    state.products = products
}

export const SET_PRODUCT = (state, product) => {
    state.product = product;
}

export const ADD_TO_CART = (state, { product, quantity }) => {
    if(product.stock === 1){
        return
    }
    let productInCart = state.cart.find(item => {
        return item.product.id === product.id
    })

    if (productInCart) {
        productInCart.quantity += quantity;
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
    if(productInCart.quantity > product.stock){
        productInCart.quantity = product.stock
        return
    }
    sessionStorage.setItem('cart', JSON.stringify(state.cart));
}

export const DIMINISH_QUANTITY_FROM_PRODUCT = (state, product) => {
    let productInCart = state.cart.find(item => {
        return item.product.id === product.id
    })

    productInCart.quantity--

    if(productInCart.quantity < 1){
        productInCart.quantity = 1
        return
    }
    sessionStorage.setItem('cart', JSON.stringify(state.cart));
}

export const SET_PEDIDOS = (state, pedidos) => {
    state.pedidos = pedidos
}

export const SET_PEDIDO = (state, pedido) => {
    state.pedido = pedido
}

export const SET_DEBTS = (state, debts) => {
    state.debts = debts
}

export const REMOVE_SALE = (state, index) => {
    state.sales.splice(index, 1);
    Swal.fire('Se eliminó la venta!', '', 'success')
}

export const REMOVE_DEBT = (state, index) => {
    state.debts.splice(index, 1);
    Swal.fire('Se eliminó la venta!', '', 'success')
}