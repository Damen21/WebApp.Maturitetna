<?php
include_once 'header2.php'
?>
<nav> <div class="nav-mid"><a href="profile.php">moje objave</a> <a href="profile_auctions.php">moje dražbe</a></div> </nav>
<section class="container">
<div class="item">
<a href='createitem.php'>
<img src="slike/additem.png" alt="Girl in a jacket" width="100%" height="100%"></a>
</div>
<?php
if (isset($_SESSION['username'])) {

  include_once 'includes/dbh.inc.php';
  $sql = "SELECT * FROM item ORDER BY uploadDate DESC";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql stmt fail :(";
  } else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
      if($row["account_idaccount"]==$_SESSION['idaccount'])
      echo '<div class="item">
                        <img src="slike/userimg/' . $row["imgpath"] . '" alt="Girl in a jacket" width="400" height="400"">
                        <h2>' . $row["ime"] . '</h2>
                        <p>' . $row["opis"] . '<p>  cena: ' . $row["cena"] . '$</p><br><form action="deleteitem.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="iip" value="'.$row["imgpath"].'">
                        <input type="hidden" name="iid" value="'.$row["iditems"].'">
                        <button type="submit" name="submit">Izbriši objavo</button></form>
                        
                        <br><form action="createauction.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="iid" value="'.$row["iditems"].'">
                        <button type="submit" name="submit">Ustvari dražbo</button></form>
                        </div>';
    }
  } /////////////////////////////////////////////
}
echo'</section>';

?>