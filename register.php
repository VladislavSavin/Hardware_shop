<?php
    require_once 'connect.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $connect->prepare("INSERT INTO Users (Name, Login, Password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $login, $hashed_password);

        if ($stmt->execute()) {
            setcookie("login", $login, time() + (86400), "/");
            header("Location: index.php");
            exit();
        } else {
            echo "Ошибка: " . $stmt->error;
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
    <title>Регистрация</title>
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
            <h1>Регистрация пользователя</h1>
            <div class="form_cont">
                <form action="register.php" method="post" class="authform">
                    <label for="name" class="form-label">Имя:</label><br>
                    <input type="text" id="name" name="name" required class="form-input"><br><br>
                    
                    <label for="login" class="form-label">Логин:</label><br>
                    <input type="text" id="login" name="login" required class="form-input"><br><br>
                    
                    <label for="password" class="form-label">Пароль:</label><br>
                    <input type="password" id="password" name="password" required class="form-input"><br><br>
                    
                    <input type="submit" value="Зарегистрироваться" class="register-button">
                </form>
            </div>
        </div>
    </div>

</body>
</html>
