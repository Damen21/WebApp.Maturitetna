<?php
include_once 'header.php'
?>


        <?php
if (isset($_SESSION['username'])) {

    include_once 'includes/dbh.inc.php';
    $sql = "SELECT username,idaccount FROM account INNER JOIN msgs ON(msgs.posiljatelj=account.idaccount)
    WHERE msgs.prejemnik=".$_SESSION['idaccount']."
    UNION
    SELECT username,idaccount FROM account INNER JOIN msgs ON(msgs.prejemnik=account.idaccount)
    WHERE msgs.posiljatelj=".$_SESSION['idaccount']." 
    ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "sql stmt fail :(";
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
    
      echo'<div class="message mCustomScrollbar" data-mcs-theme="minimal-dark">
      <div class="main-section">
      <div class="head-section">
      
      <div class="headRight-section">
      <div class="headRight-sub">
      <h3></h3>
      </div>
      </div>
      </div>
      <div class="body-section">
      <div class="left-section mCustomScrollbar" data-mcs-theme="minimal-dark">
      <ul>';
      while ($row = mysqli_fetch_assoc($result)) {
        $ime=$row["username"];
        echo'
        <li>
        <div class="chatList">
        <a href="dms.php?uporabnik='.$row["idaccount"].'">
        <div class="img">
        <img src="slike/icon.png">
        </div>
        <div class="desc">
        <h5>'.$row["username"].'
        </h5>
       
        </div>
        </a>
        </div>
        </li>';

      } 
    }
    echo'</ul>
    </div>
    <div class="right-section">
    <div class="message mCustomScrollbar" data-mcs-theme="minimal-dark">
    <ul>';
if(isset($_GET["uporabnik"])){
    $sql = "SELECT * FROM msgs WHERE (posiljatelj=".$_GET["uporabnik"]." AND prejemnik=".$_SESSION["idaccount"].") OR (posiljatelj=".$_SESSION["idaccount"]." AND prejemnik=".$_GET["uporabnik"].") ORDER BY cas_napisa ASC";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "sql stmt fail :(";
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while ($row = mysqli_fetch_assoc($result)) {
       if($row["posiljatelj"]==$_SESSION["idaccount"]){
         $smer="right";
       }
       else
       $smer="left";
        echo '<li class="msg-'.$smer.'">
        <div class="msg-'.$smer.'-sub">
        <img src="slike/icon.png">
        <div class="msg-desc">
        ' . $row["besedilo"] .'
        </div>
        <small>' . $row["cas_napisa"] . '</small>
        </div>
        </li>';
       
      }
      echo'</ul></div></div>
      </div>';
      echo'<div class="right-section-bottom">
      <form action="uploadmsg.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="msg" placeholder="type here...">
      <input type="hidden" name="sid" value="' . $_SESSION['idaccount'] . '">
                        <input type="hidden" name="rid" value="' . $_GET["uporabnik"] . '">
      <button class="btn-send"><i class="fa fa-send"></i></button>
      </form>
      </div>
      </div>';
    } 
    
    /////////////////////////////////////////////
    }
   
}
  

        ?>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- custom scrollbar plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>       
        
</body>
</html>