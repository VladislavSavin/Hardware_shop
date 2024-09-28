<?php
setcookie("login", "", time() - 86300, "/");
header("Location: authorization.php");
exit();
?>