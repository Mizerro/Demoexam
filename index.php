<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Водить.РФ - курсы обучения вождению</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/slider.css">
  
  <!-- Стили для выравнивания иконки и текста в логотипе -->
  <style>
    .logo {
      display: flex;
      align-items: center;
      gap: 10px; /* Отступ между иконкой и текстом */
      text-decoration: none;
      color: inherit;
      font-weight: bold;
      font-size: 24px;
    }
    .logo-icon {
      width: 36px;
      height: 36px;
      object-fit: contain;
    }
  </style>
</head>
<body>
<!-- Шапка сайта -->
<div class="header">
  <div class="nav">
    <a href="index.php" class="logo">
      <img src=media/image.png alt="Иконка сайта" class="logo-icon" onerror="this.style.display='none'">
      <span class="logo-text">Водить.РФ</span>
    </a>

    <!-- Кнопки для неавторизованных -->
    <?php if(!isset($_SESSION['user_id'])): ?>
      <div class="nav-buttons">
        <a href="login.php" class="btn-login">Войти</a>
        <a href="register.php" class="btn-register">Регистрация</a>
      </div>
    <!-- Кнопки для администратора -->
    <?php elseif($_SESSION['admin']): ?>
      <!-- Обработка кнопки выхода -->
      <?php if(isset($_GET['index'])) { 
        session_destroy(); 
        header('Location:index.php'); 
        exit;}?>
      <div class="nav-buttons">
        <a href="admin.php" class="btn-admin">Панель администратора</a>
        <a href="?index=1" class="btn-exit">Выход</a>
      </div>
    <!-- Кнопки для обычных пользователей -->
    <?php else: ?>
      <div class="nav-buttons">
        <a href="history.php" class="btn-lk">Мои заявки</a>
        <a href="create.php" class="btn-create">Новая заявка</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Слайдер с картинками -->
<div class="slideshow-container">
  <div class="mySlides fade">
    <img src="media/boat.jpg" style="width:100%">
    <div class="text">Лодочка</div>
  </div>
  <div class="mySlides fade">
    <img src="media/kater.jpg" style="width:100%">
    <div class="text">Катер</div>
  </div>
  <div class="mySlides fade">
    <img src="media/lainer.jpg" style="width:100%">
    <div class="text">Лайнер</div>
  </div>
  <div class="mySlides fade">
    <img src="media/port.jpg" style="width:100%">
    <div class="text">Порт</div>
  </div>
  <!-- Стрелки переключения -->
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>
</div>

<!-- Точки навигации -->
<div class="dot-container">
  <span class="dot active" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span>
</div>

<script src="script/script.js"></script>
</body>
</html>