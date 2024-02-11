document.addEventListener('DOMContentLoaded', function() {
    const minPriceInput = document.getElementById('filter-min');
    const maxPriceInput = document.getElementById('filter-max');

    function filterProducts() {
        const minPrice = parseInt(minPriceInput.value, 10) || 0;
        // Используем value для получения максимальной цены
        const maxPrice = parseInt(maxPriceInput.value, 10) || Infinity;

        document.querySelectorAll('.js-product').forEach(product => {
            const price = parseInt(product.getAttribute('data-product-price'), 10);
            if (price >= minPrice && price <= maxPrice) {
                product.style.display = '';
                
                product.classList.add('cart');
            } else {
                product.style.display = 'none';
                console.log(product);
                product.classList.remove('cart');
            }
        });
    }

    minPriceInput.addEventListener('input', filterProducts);
    maxPriceInput.addEventListener('input', filterProducts);
});
