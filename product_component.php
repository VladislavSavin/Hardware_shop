<?php
function renderProduct($product, $connect, $userId) {
    // Проверка наличия файлов cookie
    if (!isset($_COOKIE['login'])) {
        header('Location: authorization.php');
        exit;
    }

    // Проверяем наличие товара в корзине
    $sql2 = "SELECT * FROM Cart WHERE user_id = '$userId' AND product_id = '" . $product->getId() . "'";
    $result2 = $connect->query($sql2);

    if ($result2->num_rows > 0) {
        // Товар уже в корзине
        echo '
            <div class="product">
                <div class="product_image"><img src="' . htmlspecialchars($product->getPhoto()) . '" alt="' . htmlspecialchars($product->getName()) . '"></div>
                <div class="product-info">
                    <h3>' . htmlspecialchars($product->getName()) . '</h3>
                    <p>Стоимость: ' . htmlspecialchars($product->getCost()) . ' руб.</p>
                    <div class="header_buttons1">
                        <button onclick="location.href=\'cart.php\'" class="cart_button">Уже в корзине<img src="../images/in_cart.png"></button>
                    </div>
                </div>
            </div>
        ';
    } else {
        // Товар не в корзине
        echo '
            <div class="product">
                <div class="product_image"><img src="' . htmlspecialchars($product->getPhoto()) . '" alt="' . htmlspecialchars($product->getName()) . '"></div>
                <div class="product-info">
                    <h3>' . htmlspecialchars($product->getName()) . '</h3>
                    <p>Стоимость: ' . htmlspecialchars($product->getCost()) . ' руб.</p>
                    <div class="header_buttons">
                        <button onclick="addToCart(' . $product->getId() . ')" class="add_cart_button">Добавить в корзину<img src="../images/add_cart.png"></button>
                    </div>
                </div>
            </div>
        ';
    }
}