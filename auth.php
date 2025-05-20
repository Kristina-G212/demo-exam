<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Страница авторизации</title>
</head>
<body>
<?php
require_once "header.php";
?>
  <main class="container">
    <h1>Авторизация</h1>
    <form action="php/auth.php" method="post">
    <div class="mb-3">
      <label for="login" class="form-label">Логин</label>
      <input type="text" class="form-control" id="login" name="login" aria-describedby="login" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Пароль</label>
      <input type="password" class="form-control" id="password" name="password" aria-describedby="password" required minlength="6">
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
  </form>
</main>
</body>
</html>
<script src="js/bootstrap.js"></script>