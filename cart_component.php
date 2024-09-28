<?php
function renderProduct($product, $connect, $userId) {
    // Проверка наличия файлов cookie
    if (!isset($_COOKIE['login'])) {
        header('Location: authorization.php');
        exit;
    }
    $sql2 = "SELECT * FROM Cart WHERE user_id = '$userId' AND product_id = '" . $product->getId() . "'";
    $result2 = $connect->query($sql2);

    if ($result2->num_rows > 0) {
        echo '
            <div class="product">
                <div class="product_image"><img src="' . htmlspecialchars($product->getPhoto()) . '" alt="' . htmlspecialchars($product->getName()) . '"></div>
                <div class="product-info">
                    <h3>' . htmlspecialchars($product->getName()) . '</h3>
                    <p>Стоимость: ' . htmlspecialchars($product->getCost()) . ' руб.</p>
                    <div class="header_buttons">
                        <button onclick="DeleteFromCart(' . $product->getId() . ')" class="delete_cart_button">Удалить<img src="../images/trash.png"></button>
                        <button onclick="BuyFromCart(' . $product->getId() . ')" class="buy_cart_button">Заказать<img src="../images/dollar.png"></button>
                    </div>
                </div>
            </div>
        ';
    } 
}
