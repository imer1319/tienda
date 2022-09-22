export const getProducts = ({ commit }) => {
    axios.get('/api/products-all')
        .then(response => {
            commit('SET_PRODUCTS', response.data);
        })
}

export const getProduct = ({ commit }, productSlug) => {
    axios.get(`/api/products/${productSlug}`)
        .then(response => {
            commit('SET_PRODUCT', response.data);
        })
}

export const addProductToCart = ({ commit }, { product, quantity }) => {
    commit('ADD_TO_CART', { product, quantity })
}

export const removeProductFromCart = ({ commit }, product) => {
    commit('REMOVE_PRODUCT_FROM_CART', product);
}

export const addQuantityFromProduct = ({ commit }, product) => {
    commit('ADD_QUANTITY_FROM_PRODUCT', product);
}

export const diminishQuantityFromProduct = ({ commit }, product) => {
    commit('DIMINISH_QUANTITY_FROM_PRODUCT', product);
}