<?php
$connect = mysqli_connect('localhost', 'savinvzf_test', 'Ft240rvl!', 'savinvzf_test');
if (!$connect) {
    die('Error connecting to database: ' . mysqli_connect_error());
}
