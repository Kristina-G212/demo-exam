<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Страница формирования заявки</title>
</head>
<body>
<?php
require_once "header.php";
?>
<main class="container">
  <h1>Формирование заявки</h1>
  <a href="cr_zay.php">Назад</a>
  <form action="php/order.php" method="post">
    <div class="visually-hidden">
      <label for="id" class="form-label">id</label>
      <input type="text" class="form-control" id="id" name="id" value="<?= $_SESSION["id"] ?>" aria-describedby="id" required>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Адрес</label>
      <input type="text" class="form-control" id="address" name="address" aria-describedby="address" required>
    </div>
    <div class="mb-3">
      <label for="tel" class="form-label">Телефон в формате +7(XXX)-XXX-XX-XX</label>
      <input type="tel" class="form-control" id="tel" name="tel" aria-describedby="tel" required value="+7("
         pattern="\+7[\(][0-9]{3}[\)]-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="+7(___)___-__-__">
    </div>  
    <div class="mb-3">
      <label for="date" class="form-label">Дата и время получения услуги</label>
      <input type="datetime-local" class="form-control" id="date" name="date" aria-describedby="date" required>
    </div>
    <div class="mb-3">
      <label for="type" class="form-label">Вид услуги</label>
      <select class="form-select" id="type" name="type" required>
        <?php

        require_once('php/db.php');
        $query = "SELECT * FROM `type`";

        $result = $mysqli->query($query);

        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            echo '
            
                <option value="'. $row["id"] .'">'. $row["type"] .'</option>
            
            ';
        }
        ?>
      </select>
    </div>  
    <div class="mb-3">
      <label for="comment" class="form-label">Введите услугу</label>
      <textarea class="form-control" id="comment" name="comment" disabled value=" "></textarea>
    </div>
        <div class="mb-3">
      <label for="type_pay" class="form-label">Вид оплаты</label>
      <select class="form-select" id="type_pay" name="type_pay" required>
        <?php

        require_once('php/db.php');
        $query = "SELECT * FROM `type_pay`";

        $result = $mysqli->query($query);

        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            echo '
            
                <option value="'. $row["id"] .'">'. $row["type"] .'</option>
            
            ';
        }
        ?>
      </select>
    </div> 
    <button type="submit" class="btn btn-primary">Оформить</button>
  </form>
</main>
</body>
</html>
<script src="js/bootstrap.js"></script>
<script>
  const typeSelect = document.getElementById("type"); 
  const comment = document.getElementById("comment");

  typeSelect.addEventListener("change", function () {
    comment.disabled = this.value !== "5";
  });
</script>
