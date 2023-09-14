<?php
include_once 'header.php';
$img=$_POST["iid"];
$sql="INSERT INTO Watchlist(account_idaccount,items_iditems) VALUES(".$_SESSION['idaccount'].",".$img.")";
require_once('includes/dbh.inc.php');
$stmt=mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:index.php?error=errornone");