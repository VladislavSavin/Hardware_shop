function addToCart(productId) {
    console.log('Product ID:', productId);
    const login = getCookie('login'); // Получаем логин из cookie
    console.log('Login cookie:', login);
    // Получаем user_id по логину
    fetch('get_user_id.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ login: login })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const userId = data.user_id;

            // Теперь добавляем товар в корзину
            return fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ productId: productId, userId: userId })
            });
        } else {
            alert('Ошибка при получении user_id.');
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
            alert('Товар добавлен в корзину!');
        } else {
            alert('Ошибка при добавлении товара в корзину.');
        }
    })
    .catch(error => console.error('Ошибка:', error));
}