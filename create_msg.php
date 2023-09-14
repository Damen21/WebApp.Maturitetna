<?php
include_once 'includes/dbh.inc.php';
include_once 'header2.php';
$sender = $_POST["sid"];
$reciever = $_POST["rid"];
echo"$sender,$reciever";
echo '
<div class="login-box">
<form action="uploadmsg.php" method="post">
<div class="user-box">
<input type="text" name="msg" placeholder="msg here...">
<label>text</label>
</div>
<input type="hidden" name="sid" value="'.$sender.'">
<input type="hidden" name="rid" value="'.$reciever.'">
</select>
        <button type="submit" name="submit">SEND</button>
    </form>
    
</div>';
