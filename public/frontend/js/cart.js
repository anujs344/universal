
// cart page
const plusCart = document.getElementById('plusCart');
const quantityNumberCart = document.getElementById('quantityNumberCart');
const minusCart = document.getElementById('minusCart');

plusCart.addEventListener('click', () => {
    quantityNumberCart.value++;
});
minusCart.addEventListener('click', () => {
    if (quantityNumberCart.value > 1) {
        quantityNumberCart.value--;
    }
});