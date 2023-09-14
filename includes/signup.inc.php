<?php
if(isset($_POST["submit"])){
$kraj= $_POST["kraj"];
$email= $_POST["email"];
$instagram=$_POST["instagram"];
$username= $_POST["uid"];
$pwd= $_POST["pwd"];
$pwdRepeat= $_POST["pwdrepeat"];

require_once'dbh.inc.php';
require_once'functions.inc.php';

if(emptyInputSignup($kraj,$email,$instagram,$username,$pwd,$pwdRepeat)!==false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}

if(invalidUid($username)!==false){
    header("location: ../signup.php?error=invalidUsername");
    exit();
}
if(invalidEmail($email)!==false){
    header("location: ../signup.php?error=invalidEmail");
    exit();
}
if(pwdMatch($pwd,$pwdRepeat)!==false){
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
}
if(uidExists($conn,$username,$email)!==false){
    header("location: ../signup.php?error=usernametaken");
    exit();
}
createUser($conn,$kraj,$email,$instagram,$username,$pwd);

}
else{
    header("location: ../signup.php");
}