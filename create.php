<?php
session_start(); // Начинаем сессию для доступа к данным пользователя
if($_SERVER['REQUEST_METHOD'] == 'POST') { //обработка отправки формы
    include('db.php');
    $con->query("INSERT INTO request (review, date, curses, payment, user_id) VALUES ('{$_POST['review']}', '{$_POST['date']}', '{$_POST['curses']}', '{$_POST['payment']}', '{$_SESSION['user_id']}')") or die('Ошибка: ' . $con->error);
    header('Location: history.php'); //перемещение на страничку истории
    exit;}?>
<html>
<head>
    <title>Создание заявки</title>
    <link rel = "stylesheet" href = "styles/style.css"></head>
<body>
<!-- Шапка сайта -->
<div class = "header"> 
    <div class = "nav">
        <a href = "index.php" class = "logo">Водить.РФ</a>
        <div class = "nav-buttons">
            <a href = "history.php" class = "btn-lk">Мои заявки</a>
            <a href = "create.php" class = "btn-active">Новая заявка</a>
        </div>
    </div>
</div>
<!-- Основной контент -->
<div class = "container">
    <div class = "booking-card">
        <div class = "booking-header"><h1>Создание заявки</h1></div>
         <!-- Форма создания заявки -->
        <form method="POST" class = "form-group">
            <label for='curses'>Вид транспорта</label>
            <select required name="curses">
                <option value="Лодка">Лодка</option>
                <option value="Лайнер">Лайнер</option>
                <option value="Катер"> Катер</option>
            </select>
            <label>Дата начала</label><input type="datetime-local" name="date">
            <label>Способ оплаты</label>
                <select required name="payment">
                <option value="наличные">Наличные</option>
                <option value="перевод">Переводом</option>
            </select>
            <button class = "btn-sub">Отправить</button>
        </form>
    </div>
</div>
</body>
</html>