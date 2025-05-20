<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Страница регистрации</title>
</head>
<body>
<?php
require_once "header.php";
?>
  <main class="container">
    <h1>Регистрация</h1>
    <form action="php/reg.php" method="post">
    <div class="mb-3">
      <label for="login" class="form-label">Логин</label>
      <input type="text" class="form-control" id="login" name="login" aria-describedby="login" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Пароль</label>
      <input type="password" class="form-control" id="password" name="password" aria-describedby="password" required minlength="6">
    </div>
    <div class="mb-3">
      <label for="fio" class="form-label">ФИО</label>
      <input type="text" class="form-control" id="fio" name="fio" aria-describedby="fio" required pattern="[А-Яа-я]*?\s[А-Яа-я]*?\s[А-Яа-я]*">
    </div>
    <div class="mb-3">
      <label for="tel" class="form-label">Телефон в формате +7(XXX)-XXX-XX-XX</label>
      <input type="tel" class="form-control" id="tel" name="tel" aria-describedby="tel" required value="+7("
         pattern="\+7[\(][0-9]{3}[\)]-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="+7(___)___-__-__">
    </div>  
    <div class="mb-3">
      <label for="email" class="form-label">Адрес электоронной почты</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required>
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
  </form>
</main>
</body>
</html>
<script src="js/bootstrap.js"></script>