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

export const getSales = ({ commit }) => {
    axios.get('/api/sales')
    .then(res => {
        commit('SET_SALES', res.data.data);
    })
}

export const getSale = ({ commit }, {sale}) => {
    commit('SET_SALE', sale);
}

export const getDebts = ({ commit }) => {
    axios.get('/api/debts')
    .then(res => {
        commit('SET_DEBTS', res.data.data);
    })
}

export const removeSale = ( { commit }, { sale, index } ) => {
    Swal.fire({
        title: '¿Realmente quiere eliminar esta venta?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/sales/${sale.id}`)
            .then(res => {
                commit('REMOVE_SALE', index);
            }).catch(err => {
                Swal.fire('Hubo errores al eliminar', '', 'info')
            })
        } else if (result.isDenied) {
            Swal.fire('Se mantuvieron los cambios', '', 'info')
        }
    })
}

export const removeDebt = ( { commit }, { sale, index } ) => {
    Swal.fire({
        title: '¿Realmente quiere eliminar esta venta?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/sales/${sale.id}`)
            .then(res => {
                commit('REMOVE_DEBT', index);
            }).catch(err => {
                Swal.fire('Hubo errores al eliminar', '', 'info')
            })
        } else if (result.isDenied) {
            Swal.fire('Se mantuvieron los cambios', '', 'info')
        }
    })
}

export const storeDebt = ({ commit }, {sale, amount}) => {
    axios.post(`/api/debts/${sale.id}`,{
        amount: amount
    }).then(res => {
        $('#product-modal').modal('hide')
    }).catch(err => {
        console.log(err.response.data)
    })
}