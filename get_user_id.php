<?php
require_once 'connect.php';

$data = json_decode(file_get_contents("php://input"), true);
$login = $data['login'];

// Получаем user_id по логину
$sql = "SELECT user_id FROM Users WHERE login = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode(['success' => true, 'user_id' => $user['user_id']]);
} else {
    echo json_encode(['success' => false, 'error' => 'Пользователь не найден.']);
}

$stmt->close();
$connect->close();
?>
