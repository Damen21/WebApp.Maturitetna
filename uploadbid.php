<?php
include_once 'includes/dbh.inc.php';
$bid = $_POST["bid"];
$auid = $_POST["auid"];
$uid=$_POST["uid"];

$sql="INSERT INTO bid(vrednost,account_idaccount,auction_idauction) VALUES(?,?,?)";
$stmt=mysqli_stmt_init($conn);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt,"iii",$bid,$uid,$auid);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$sql="select * from auction where idauction=$auid;";
$stmt=mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
$currpice=$row['currentprice'];
if($currprice<$bid)
{
    $sql="UPDATE auction
    SET currentprice=$bid,expiration_date=expiration_date
     WHERE idauction=$auid ;";
    $stmt=mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
}


header("location:auctionsite.php?error=errornone");