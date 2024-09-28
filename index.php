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
        <div class="cart"><a href="cart.php" class="custom-link"><img src="../images/cart.png"></a></div>
        <?php if (isset($_COOKIE['login'])): ?>
            <a href="exit.php" class="custom-link"><img src="../images/exit_button.png"></a>
        <?php else: ?>
            <a href="authorization.php" class="custom-link">Вход</a>
        <?php endif; ?>
    </div>
</header>

<div class="body-content">
    <h1>Список товаров</h1>
    <?php
        require_once 'connect.php';
        require_once 'product.php';
        require_once 'product_component.php';

        $limit = 12;
        $offset = 0;

        $sql = "SELECT product_id, name, photo, cost, type FROM Products ORDER BY product_id LIMIT $limit OFFSET $offset";
        $result = $connect->query($sql);

        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product($row['product_id'], $row['name'], $row['photo'], $row['cost'], $row['type']);
                $products[] = $product;
                
            }
        } else {
            echo "Товаров нет.";
        }

        $login = $_COOKIE['login'];
        $sql1 = "SELECT user_id FROM Users WHERE login = '$login'";
        $result1 = $connect->query($sql1);
        $row1 = $result1->fetch_assoc();
        $userId = $row1["user_id"];

        echo '<div id="productContainer" class="productContainer">';
        if (!empty($products)) {
            foreach ($products as $product) {
                renderProduct($product, $connect, $userId);
            }
        }
        echo '</div>';
        
    ?>
    <div id="loading" class="loading">
        <img src="/images/loading.gif" alt="Loading">
    </div>
    <button id="loadMore" onclick="loadMoreProducts(<?=$userId?>)" class="more_button">Показать ещё <img src="../images/more_button.png"></button>
    <?php require_once'load_more_products.php'; ?>
        
    <script src="/js_files/add_to_cart.js"></script>
    <script src="/js_files/get_cookie.js"></script>
   
</div>


<footer>
    <div class="logo">
        <img src="../images/logo.png">
    </div>
    <div class="contact-info">Телефон: +7(999)705-68-14</div>
</footer>

</body>
</html>