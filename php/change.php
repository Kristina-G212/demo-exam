<?php 
require_once("db.php");

$id = $_POST["id"];
$status = $_POST["status"];
$comment  = isset($_POST["comment"]) ? $_POST["comment"] : "";

// echo $id . " " .$status . " " .$comment;

$mysqli->query("UPDATE `zay` SET `FK_status`='$status',`admin_comment`='$comment' WHERE `id`=$id"); 
header("location: ../admin.php");
exit();
