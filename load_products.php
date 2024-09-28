<?php
require_once 'connect.php';

$limit = 12;
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$sql = "SELECT product_id, name, photo, cost, type FROM Products ORDER BY product_id LIMIT $limit OFFSET $offset";
$result = $connect->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
$size = count($products);
header('Content-Type: application/json');
echo json_encode($products);
?>