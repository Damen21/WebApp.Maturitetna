<?php
include_once 'includes/dbh.inc.php';
include_once'header2.php';
echo'<section class="container">';
  $sql = "SELECT item.* FROM item 
  INNER JOIN watchlist ON(watchlist.items_iditems=item.iditems)
  INNER JOIN account ON(account.idaccount=watchlist.account_idaccount)
  WHERE watchlist.account_idaccount=".$_SESSION['idaccount']."";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql stmt fail :(";
  } else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
      //if($row["account_idaccount"]==$_SESSION['idaccount'])
      echo '<div class="item">
                        <img src="slike/userimg/' . $row["imgpath"] . '" alt="Girl in a jacket" width="400" height="400"">
                        <h2>' . $row["ime"] . '</h2>
                        <p>' . $row["opis"] . '  cena: ' . $row["cena"] . '$</p><br><form action="deletefavourite.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="iid" value="'.$row["iditems"].'">
                        <input type="hidden" name="uid" value="'.$_SESSION['idaccount'].'">
                        <button type="submit" name="submit">Remove from favourites</button></form></div>';
    }
  }
  echo'</section>';