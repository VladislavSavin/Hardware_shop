<?php
require_once 'connect.php';

$userId = $_GET['user_id'];
$productId = $_GET['product_id'];

$sql = "SELECT * FROM Cart WHERE user_id = '$userId' AND product_id = '$productId'";
$result = $connect->query($sql);

echo json_encode(['inCart' => $result->num_rows > 0]);
?>