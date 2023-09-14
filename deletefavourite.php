<?php
$item=$_POST["iid"];
$user=$_POST["uid"];
$sql="DELETE FROM Watchlist WHERE account_idaccount='$user' AND items_iditems='$item'";
require_once('includes/dbh.inc.php');
$stmt=mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
if(mysqli_stmt_execute($stmt))
mysqli_stmt_close($stmt);
header("location:favourites.php?error=errornone");