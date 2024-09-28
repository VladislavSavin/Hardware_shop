<?php
require_once 'connect.php';
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

if ($userId && isset($_POST['product_id'])) {
    $productId = intval($_POST['product_id']);
    $stmt = $connect->prepare("DELETE FROM Cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $stmt->close();
    
    echo "Товар удалён из корзины.";
} else {
    echo "Ошибка при удалении товара.";
}
?>