<?php
// Обработка входа пользователя
$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('db.php');
    $query = $con->query("SELECT * FROM users WHERE login='{$_POST['login']}' AND password='{$_POST['password']}'") or die('Ошибка: ' . $con->error);
    $user = $query->fetch_assoc();
    if(!$user) $error = 'Неверный логин или пароль';
    else {
        session_start();
        $_SESSION['user_id'] = $user['id']; // Сохраняем ID пользователя
        $_SESSION['admin'] = $user['login'] == 'Admin26'; // Проверяем, является ли админом
        header('Location: index.php');
        exit;
    }
}?> <!-- Переходим на главную -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - Водить.РФ</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>
<body class="body-form">
    <div class="login-container">
        <a href='index.php' class='index-link'>◄ На главную</a>
        <h1>Вход в систему</h1>
        <p>Войдите в свой аккаунт</p>
        <?php if($error): ?>
            <div class="error-message" style="color: #000000; background: #6C757D; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <!-- Форма входа -->
        <form method="POST">
            <label>Логин</label>
            <input type="text" name="login" required>
            <label>Пароль</label>
            <input type="password" name="password" required>
            <button type="submit" class="btn-sub">Войти</button>
        </form>
        <p>Нет аккаунта? <a href="register.php" class='register-link'>Зарегистрироваться</a></p>
    </div>
</body>
</html>