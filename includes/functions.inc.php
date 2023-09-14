<?php
function emptyInputSignup($kraj, $email, $instagram, $username, $pwd, $pwdRepeat)
{
    
    if  (empty($kraj) || empty($email) || empty($instagram) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $api_key="cd24f1687c8d4d7099e417936f3d0d19";
        $ch=curl_init();
        curl_setopt_array($ch,[
            CURLOPT_URL=>"https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email",
            CURLOPT_RETURNTRANSFER=> true,
            CURLOPT_FOLLOWLOCATION=> true
        ]);
        $response=curl_exec($ch);
        curl_close($ch);
        $data=json_decode($response,true);
        if($data['deliverability']=="UNDELIVERABLE"){
            $result = true;
            
        }else{
            if($data["is_disposable_email"]["value"]===true){
                $result = true;
                
            }
            else{
                $result = false;
            }
        }
       
        
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat)
{
    if ($pwd!==$pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn,$username,$email){
    $sql = "SELECT * FROM account WHERE username = ? OR email=?;";
    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $resultData=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return$result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$kraj,$email,$instagram,$username,$pwd){ 
    $sql = "INSERT INTO account(kraj,email,instagram,username,accpwd) VALUES(?,?,?,?,?)";
    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sssss",$kraj,$email,$instagram,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=errornone");
    exit();
}

function emptyInputLogin($username,$pwd){
if(empty($username)||empty($pwd)){
    $result=true;
}
else{
    $result=false;
}
return $result;
}
function loginUser($conn,$username,$pwd){
    $uidExists=uidExists($conn,$username,$username);
    if($uidExists===false){
        header("location: ../login.php?error=userdoesnotexists");
        exit();
    }
    $pwdHashed=$uidExists["accpwd"];
    $checkPwd=password_verify($pwd,$pwdHashed);

    if($checkPwd===false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd===true){
        session_start();
        $_SESSION["idaccount"]=$uidExists["idaccount"];
        $_SESSION["username"]=$uidExists["username"];
        header("location: ../index.php?error=wronglogin");
        exit();
    }


}