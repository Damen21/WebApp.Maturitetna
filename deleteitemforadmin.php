<?php
$img=$_POST["iip"];
$iid=$_POST["iid"];
require_once('includes/dbh.inc.php');
$sql="DELETE FROM watchlist WHERE items_iditems='$iid'";
$stmt=mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
$sql="DELETE FROM item WHERE imgpath='$img'";
$stmt=mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
if(mysqli_stmt_execute($stmt))
unlink("slike/userimg/".$img);
mysqli_stmt_close($stmt);
header("location:index.php?error=errornone");