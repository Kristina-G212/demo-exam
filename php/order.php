<?php 
require_once("db.php");

$id = $_POST["id"];
$address = $_POST["address"];
$tel = $_POST["tel"];
$date = str_replace("T", " ", $_POST["date"]) . ":00";
$type = $_POST["type"];
$type_pay = $_POST["type_pay"];
$status = 1;
$comment  = isset($_POST["comment"]) ? $_POST["comment"] : "";
$admin_comment  = "";

// echo $id . " " .$address . " " .$tel . " " .$date . " " .$type . " " .$comment . " " .$type_pay;

$mysqli->query("INSERT INTO `zay`(`FK_user`, `address`, `tel`, `date`, `FK_type`, `FK_type_pay`, `FK_status`, `comment`, `admin_comment`) VALUES ('$id','$address','$tel','$date','$type','$type_pay','$status','$comment','$admin_comment')"); 
header("location: ../cr_zay.php");
exit();
