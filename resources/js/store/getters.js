export const cartItemCount = (state) => {
    let count = '';
    state.cart.forEach(item => {
        count += item.quantity;
    });
    return count;
}

export const cartTotalPrice = (state) => {
    let total = 0;
    state.cart.forEach(item => {
        total += item.product.price * item.quantity;
    });
    return total;
}
