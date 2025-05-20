<?php 
require_once("db.php");

$login = $_POST["login"];
$password = $_POST["password"];
$hashed_password = hash('md5', $password);

$result = $mysqli->query("SELECT * FROM `user`");

$found = false;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row["login"] === $login && $row["password"] === $hashed_password) {
        session_start();
        $_SESSION["auth"] = true;
        $_SESSION["login"] = $row["login"];
        $_SESSION["id"] = $row["id"];
        if ($row["login"] === "adminka") {
            header("location: ../admin.php");
        } else {
            header("location: ../cr_zay.php");
        }
        exit();
    }
}

echo "Неверный логин или пароль";
exit();
?>
