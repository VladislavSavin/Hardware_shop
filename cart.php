<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="../css_files/header.css">
    <link rel="stylesheet" href="../css_files/main.css">

</head>
<body>

<header>
    <div class="logo">
        <img src="../images/logo.png">
    </div>
    <div class="contact-info">Телефон: +7(999)705-68-14</div>
    <div class="Right">
        <div class="cart"><a href="index.php" class="custom-link"><img src="../images/home.png"></a></div>
        <?php if (isset($_COOKIE['login'])): ?>
            <a href="exit.php" class="custom-link"><img src="../images/exit_button.png"></a>
        <?php else: ?>
            <a href="authorization.php" class="custom-link">Вход</a>
        <?php endif; ?>
    </div>
    
</header>

<div class="body-content">
    <h2>Корзина</h2>
    <?php
        require_once 'connect.php';
        require_once 'product.php';
        require_once 'cart_component.php';
        require_once 'get_cookie.php';

        $login = getCookie('login');
        $userId = null;

        if ($login) {
            $stmt = $connect->prepare("SELECT user_id FROM Users WHERE login = ?");
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $stmt->bind_result($userId);
            $stmt->fetch();
            $stmt->close();
        }

        $cartProducts = [];
        if ($userId) {
            $stmt = $connect->prepare("SELECT p.product_id, p.name, p.photo, p.cost FROM Cart c JOIN Products p ON c.product_id = p.product_id WHERE c.user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                $product = new Product($row['product_id'], $row['name'], $row['photo'], $row['cost'], $row['type']);
                $cartProducts[] = $product; 
            }
            $stmt->close();
        }

        echo '<div class="productContainer">';
            if (!empty($cartProducts)) {
                foreach ($cartProducts as $product) {
                    renderProduct($product, $connect, $userId);
                }
            }
            else {
                echo '<div id="cartHeader"><h2>Ваша корзина пуста.</h2></div>';
            }
        echo '</div>';
    ?>
</div>

<script>
    // Функция для удаления товара из корзины
    function DeleteFromCart(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_from_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                location.reload();
            }
        };
        xhr.send("product_id=" + productId);
    }

    // Функция для оформления заказа на товар
    function BuyFromCart(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "buy_from_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert("Товар заказан!");
                location.reload();
            }
        };
        xhr.send("product_id=" + productId);
    }
</script>

<footer>
    <div class="logo">
        <img src="../images/logo.png">
    </div>
    <div class="contact-info">Телефон: +7(999)705-68-14</div>
</footer>

</body>
</html>