<script>
    let offset = <?= $limit ?>; 

function loadMoreProducts(userId) {
    const loading = document.getElementById('loading');
    loading.style.display = 'block'; // Показываем анимацию загрузки

    fetch('load_products.php?offset=' + offset)
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('productContainer'); 
            
            data.forEach(product => {
                const productElement = document.createElement('div');
                productElement.classList.add('product'); 

                // Проверка наличия товара в корзине
                fetch(`check_cart.php?user_id=${userId}&product_id=${product.product_id}`)
                    .then(response => response.json())
                    .then(cartData => {
                        if (cartData.inCart) {
                            productElement.innerHTML = ` 
                                <div class="product_image"><img src="${product.photo}" alt="${product.name}"></div>
                                <div class="product-info">
                                    <h3>${product.name}</h3>
                                    <p>Стоимость: ${product.cost} руб.</p>
                                    <p>Тип: ${product.type}</p>
                                    <div class="header_buttons1">
                                        <button onclick="location.href='cart.php'"class="cart_button">Уже в корзине<img src="../images/in_cart.png"></button>
                                    </div>
                                </div>
                            `;
                        } else {
                            productElement.innerHTML = ` 
                                <div class="product_image"><img src="${product.photo}" alt="${product.name}"></div>
                                <div class="product-info">
                                    <h3>${product.name}</h3>
                                    <p>Стоимость: ${product.cost} руб.</p>
                                    <p>Тип: ${product.type}</p>
                                    <div class="header_buttons">
                                        <button onclick="addToCart(${product.product_id})" class="add_cart_button">Добавить в корзину<img src="../images/add_cart.png"></button>
                                    </div>
                                </div>
                            `;
                        }
                        container.appendChild(productElement);
                    });
            });

            offset += <?= $limit ?>;
            loading.style.display = 'none'; // Скрываем анимацию после загрузки
        })
        .catch(error => {
            console.error('Ошибка:', error);
            loading.style.display = 'none'; // Скрываем анимацию в случае ошибки
        });
}

</script>