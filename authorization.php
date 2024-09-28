<?php
require_once 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Подготовка SQL-запроса для поиска пользователя
    $stmt = $connect->prepare("SELECT Password FROM Users WHERE Login = ?");
    $stmt->bind_param("s", $login);
    
    // Выполнение запроса
    $stmt->execute();
    $stmt->store_result();

    // Проверка, найден ли пользователь
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Проверка пароля
        if (password_verify($password, $hashed_password)) {
            setcookie("login", $login, time() + (86400), "/");
            header("Location: index.php");
            exit();
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь с таким логином не найден.";
    }

    $stmt->close();
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css_files/header.css">
    <link rel="stylesheet" href="../css_files/register.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="../images/logo.png">
        </div>
        <div class="contact-info">Телефон: +7(999)705-68-14</div>
        <div class="Right">
            <div class="cart"><a href="#" class="custom-link"><img src="../images/teh_podd.png"></a></div>
        </div>
    </header>

    <div class="inf">
        <div class="information_cont">
            <h1>Авторизация пользователя</h1>
            <div class="form_cont">
                <form action="authorization.php" method="post" class="authform">
                    <label for="login" class="form-label">Логин:</label><br>
                    <input type="text" id="login" name="login" required class="form-input"><br><br>
                    
                    <label for="password" class="form-label">Пароль:</label><br>
                    <input type="password" id="password" name="password" required class="form-input"><br><br>
                    
                    <input type="submit" value="Войти" class="register-button">
                </form>
            </div>
            <p>Нет аккаунта? <a href="register.php" class="regist_href">Зарегистрируйтесь</a></p>
        </div>
    </div>  
    

</body>
</html>
