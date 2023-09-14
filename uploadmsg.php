<?php
include_once 'includes/dbh.inc.php';
$sender = $_POST["sid"];
$reciever = $_POST["rid"];

$msg=$_POST["msg"];
echo"$sender,$reciever,$msg  ";
$date=date("Y-m-d h:i:s");
$sql="INSERT INTO msgs(besedilo,posiljatelj,prejemnik,cas_napisa) VALUES(?,?,?,?)";
$stmt=mysqli_stmt_init($conn);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt,"siis",$msg,$sender,$reciever,$date);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:dms.php?uporabnik=$reciever");

