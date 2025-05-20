<?php 
require_once("db.php");

$login = $_POST["login"];
$password = $_POST["password"];
$hashed_password = hash('md5', $password);
$fio = $_POST["fio"];
$tel = $_POST["tel"];
$email = $_POST["email"];

// Проверка, существует ли уже такой логин
$result = $mysqli->query("SELECT * FROM `user` WHERE `login` = '$login'");

if (mysqli_num_rows($result) > 0) {
    // Пользователь с таким логином уже существует
    header("location: ../index.php");
    exit();
} else {
    // Добавляем пользователя
    $mysqli->query("INSERT INTO `user`(`login`, `password`, `fio`, `tel`, `email`) VALUES ('$login','$hashed_password','$fio','$tel','$email')"); 
    header("location: ../auth.php");
    exit();
}
?>
