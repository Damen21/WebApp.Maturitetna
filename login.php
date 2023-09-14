<?php
include_once 'header2.php'
?>
<div class="login-box">
    <h2>Log in</h2>
    <div>
        <form action="includes/login.inc.php" method="post">
            <div class="user-box">
                <input type="text" name="uid" placeholder="Username/Email">
            <label>Username</label>
            </div>
            <div class="user-box">
            <input type="password" name="pwd" placeholder="Password">
            <label>Password</label>
            <button type="submit" name="submit">Log in</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
         if ($_GET["error"] == "wronglogin") {
            echo "Napacno geslo";
        } else if ($_GET["error"] == "userdoesnotexists") {
            echo "uporabniško ime ne obstaja";
        }
    }
    ?>
</div>
</body>

</html>