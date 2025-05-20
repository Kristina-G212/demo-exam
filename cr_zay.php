<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Страница создания заявки</title>
</head>
<body>
<?php
require_once "header.php";
?>
  <main class="container">
    <a href="form_zay.php">Заявки</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Адрес</th>
          <th scope="col">Телефон</th>
          <th scope="col">Дата и время услуги</th>
          <th scope="col">Тип услуги</th>
          <th scope="col">Комментарий</th>
          <th scope="col">Тип оплаты</th>
          <th scope="col">Статус</th>
          <th scope="col">Комментарий администратора</th>
        </tr>
      </thead>
      <tbody>
<?php
$id = $_SESSION["id"];
require_once("php/db.php");

$query = "SELECT zay.*, user.*, type.*, status.*, type_pay.type AS type_pay FROM `zay` INNER JOIN `user` ON zay.FK_user = user.id INNER JOIN `type` ON zay.FK_type = type.id INNER JOIN `type_pay` ON zay.FK_type_pay = type_pay.id INNER JOIN `status` ON zay.FK_status = status.id WHERE zay.FK_user = '$id';";

$result = $mysqli->query($query);

/* fetch associative array */
while ($row = $result->fetch_assoc()) {
    echo '
    
        <tr>
          <td>'.$row["address"].'</td>
          <td>'.$row["tel"].'</td>
          <td>'.$row["date"].'</td>
          <td>'.$row["type"].'</td>
          <td>'.$row["comment"].'</td>
          <td>'.$row["type_pay"].'</td>
          <td>'.$row["status"].'</td>
          <td>'.$row["admin_comment"].'</td>
        </tr>
    
    ';
}
?>
      </tbody>
    </table>
  </main>
</body>
</html>
<script src="js/bootstrap.js"></script>