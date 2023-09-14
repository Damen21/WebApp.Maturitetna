<?php
require_once 'header2.php';
?>
<div class="login-box">
    <h2>Sign up</h2>
    <form action="includes/signup.inc.php" method="post">
        <div class="user-box">
            <input type="text" name="uid" placeholder="Username">
            <label>Username</label>
        </div>
        <div class="user-box">
        <input type="text" name="kraj" placeholder="Kraj">
            <label>Kraj</label>
        </div>
        <div class="user-box">
            <input type="text" name="email" placeholder="Email">
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="text" name="instagram" placeholder="Insagram@">
            <label>Insagram@</label>
        </div>
        <div class="user-box">
            <input type="password" name="pwd" placeholder="Password">
            <label>Password</label>
        </div>
        <div class="user-box">
            <input type="password" name="pwdrepeat" placeholder="Repeat Password">
            <label>Repeat Password</label>
        </div>
        <button type="submit" name="submit">Sign Up</button>
</div>


</form>
</div>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "vsa polja niso napolnjena";
    } else if ($_GET["error"] == "invaliduid") {
        echo "ime ne ustreza kriterijem";
    } else if ($_GET["error"] == "invalidemail") {
        echo "narobe mail";
    } else if ($_GET["error"] == "passwordsdontmatch") {
        echo "gesli se ne ujemata";
    } else if ($_GET["error"] == "stmtfailed") {
        echo "smthn went wrong";
    } else if ($_GET["error"] == "usernametaken") {
        echo "username ze obstaja";
    } else if ($_GET["error"] == "none") {
        echo "you nave signed up";
    }
}
?>

</body>

</html>