<?php
include_once 'includes/dbh.inc.php';
$start_price = $_POST["sprice"];
$duration = $_POST["ctrajanja"];
$item=$_POST["iid"];

function get_date($time=null, $format='Y-m-d H:i:s O')
{
    if(empty($time))return date($format);
    return date($format, strtotime($time));
}
$date = get_date("+ $duration hours", "Y-m-d H:i:s");
$sql="INSERT INTO auction(startingprice,expiration_date) VALUES(?,?)";
$stmt=mysqli_stmt_init($conn);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt,"ss",$start_price,$date);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_stmt_execute($stmt);
$result=mysqli_query($conn,"SELECT LAST_INSERT_ID() as vr ;");
$auid=mysqli_fetch_assoc($result)["vr"];
mysqli_stmt_close($stmt);
$sql="UPDATE item
SET auction_idauction = $auid WHERE iditems ='$item';";
$stmt=mysqli_stmt_init($conn);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:profile.php?error=errornone");