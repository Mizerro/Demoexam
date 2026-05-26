<?php
// Обработка регистрации пользователя
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('db.php');
    $con->query("INSERT INTO users (login, password, fullname, phone, email, birth_date) VALUES ('{$_POST['login']}', '{$_POST['password']}', '{$_POST['fullname']}', '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['birth_date']}')") or die('Ошибка: ' . $con->error); 
    header('Location: login.php');}?>
<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <title>Регистрация - Водить.РФ</title>
    <link rel='stylesheet' href='styles/style.css'>
    <script src='phone.js'></script>
</head>
<body class="body-form">
    <div class='register-container'>
        <a href='index.php' class='index-link'>◄ На главную</a>
        <h1>Регистрация</h1>
        <p>Создайте аккаунт для составления заявки</p>	
        <!-- Форма регистрации -->
        <form method='POST'>
            <label>ФИО*</label>
            <input type='text' name='fullname' required>
            <label>Телефон*</label>
            <input type='tel' name='phone' placeholder='+7(___)___-__-__' pattern='\+7\d{10}' maxlength='16' required>
            <label>Дата рождения</label>
            <input type='date' name='birth_date' placeholder='дд.мм.гг.'>
            <label>Email*</label>
            <input type='email' name='email' required>
            <label>Логин* (латиница, от 6 символов)</label>
            <input type='text' name='login' pattern='[a-zA-Z0-9\s]{6,}' required>
            <label>Пароль* (от 8 символов)</label>
            <input type='password' name='password' minlength='8' required>
            <button type='submit' class='btn-sub'>Зарегистрироваться</button>
        </form>
        <p>Уже есть аккаунт? <a href='login.php' class='login-link'>Войти</a></p>
    </div>
</body>
</html>