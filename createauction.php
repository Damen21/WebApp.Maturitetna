<?php
require_once 'header2.php';
$iid=$_POST["iid"];
echo'
<div class="login-box">
    <h2>Drazba</h2>
    <form action="upload_drazba.php" method="post">
        <div class="user-box">
            <input type="text" name="sprice" placeholder="Starting Price...">
            <label>Zacetna Cena</label>
        </div>
        <div class="user-box">
            <input type="text" name="ctrajanja" placeholder="h">
            <label>Cas Trajanja</label>
        </div>
        <input type="hidden" name="iid" value="'.$iid.'">
        <button type="submit" name="submit">Sign Up</button></form>
</div>';