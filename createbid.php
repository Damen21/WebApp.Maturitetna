<?php
include_once 'includes/dbh.inc.php';
include_once 'header2.php';
$auid = $_POST["auid"];
$uid=$_POST["uid"];
echo '
<div class="login-box">
<form action="uploadbid.php" method="post">
<div class="user-box">
<input type="number" name="bid" placeholder="$">
<label>Bid</label>
<input type="hidden" name="auid" value="' . $auid . '">
<input type="hidden" name="uid" value="' . $uid . '">
</div>
        <button type="submit" name="submit">POŠLJI</button>
    </form>
    
</div>';