<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Панель администратора</title>
</head>
<body>
<?php
require_once "header.php";
?>
  <main class="container">
    <h1>Панель администратора</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ФИО</th>
          <th scope="col">Электронная почта</th>
          <th scope="col">Адрес</th>
          <th scope="col">Телефон</th>
          <th scope="col">Дата и время услуги</th>
          <th scope="col">Тип услуги</th>
          <th scope="col">Комментарий</th>
          <th scope="col">Тип оплаты</th>
          <th scope="col">Статус</th>
        </tr>
      </thead>
      <tbody>
<?php
$id = $_SESSION["id"];
require_once("php/db.php");

$query = "SELECT zay.*, user.*, type.*, status.*, type_pay.type AS type_pay, zay.id AS zay_id FROM `zay` INNER JOIN `user` ON zay.FK_user = user.id INNER JOIN `type` ON zay.FK_type = type.id INNER JOIN `type_pay` ON zay.FK_type_pay = type_pay.id INNER JOIN `status` ON zay.FK_status = status.id";

$result = $mysqli->query($query);

/* fetch associative array */
while ($row = $result->fetch_assoc()) {
    echo '
    
        <tr>
          <td>'.$row["fio"].'</td>
          <td>'.$row["email"].'</td>
          <td>'.$row["address"].'</td>
          <td>'.$row["tel"].'</td>
          <td>'.$row["date"].'</td>
          <td>'.$row["type"].'</td>
          <td>'.$row["comment"].'</td>
          <td>'.$row["type_pay"].'</td>
          <td>
          <form action="php/change.php" method="post">
            <div class="visually-hidden">
              <label for="id" class="form-label">id</label>
              <input type="text" class="form-control" id="id" name="id" value=" ' . $row["zay_id"] .'" aria-describedby="id" required>
            </div>
            <div class="mb-3">
              <select class="form-select js--status" id="status" name="status" required>';

                $query1 = "SELECT * FROM `status`";
                $result1 = $mysqli->query($query1);

                /* fetch associative array */
                while ($row1 = $result1->fetch_assoc()) {
                    echo '
                    
                        <option value="'. $row1["id"] .'">'. $row1["status"] .'</option>
                    
                    ';
                }
                echo '
              </select>
              </div>
                <div class="mb-3">
                <label for="comment" class="form-label">Комментарий</label>
                <textarea class="form-control" id="comment" name="comment" disabled value="'.$row["admin_comment"].'"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </form>
          </td>
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

<script>
const statusSelects = document.getElementsByClassName("js--status");

for (let i = 0; i < statusSelects.length; i++) {
  statusSelects[i].addEventListener("change", function () {
    const commentTextarea = this.parentElement.nextElementSibling.querySelector("textarea");

    commentTextarea.disabled = this.value !== "3";
  });
}
</script>