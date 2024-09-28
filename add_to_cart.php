<?php
require_once 'connect.php';

$data = json_decode(file_get_contents("php://input"), true);
$productId = $data['productId'];
$userId = $data['userId'];

// Добавляем товар в корзину
$sql = "INSERT INTO Cart (user_id, product_id) VALUES (?, ?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param("ii", $userId, $productId);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Не удалось добавить товар в корзину.']);
}

$stmt->close();
?>