<?php
include_once 'header2.php'
?>
<!-- navigation -->
<div class="cont">
    <div class="main-content">
        <section class="container">


            <?php
            
            include_once 'includes/dbh.inc.php';
            $date=date("Y-m-d h:i:s");
            //$src = "WHERE auction_idauction IS NOT NULL AND auction.expiration_date >".$date;
            $sql = "SELECT * FROM item INNER JOIN auction ON(item.auction_idauction=auction.idauction)
            WHERE  auction.expiration_date > CURRENT_TIMESTAMP()";   
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "sql stmt fail :(";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    if (isset($_SESSION["username"])) {
                        if (!($row["account_idaccount"] == $_SESSION['idaccount']))
                            echo '<div class="item">
                        <img src="slike/userimg/' . $row["imgpath"] . '" alt="Girl in a jacket" width="400" height="400"">
                        <h2>' . $row["ime"] . '</h2>
                        <p>' . $row["opis"] . ' <p>   current bid: ' . $row["currentprice"] . '$<p> konca se:'.$row['expiration_date'].'$<p> asking price:'.$row['startingprice'].'</p>
                         <form action="createbid.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="auid" value="' . $row["idauction"] . '">
                        <input type="hidden" name="uid" value="' . $_SESSION['idaccount'] . '">
                        <button type="submit" name="submit">PLACE BID</button></form>
                        </div>';
                    }
                    else{
                        echo '<div class="item">
                        <img src="slike/userimg/' . $row["imgpath"] . '" alt="Girl in a jacket" width="400" height="400"">
                        <h2>' . $row["ime"] . '</h2>
                        <p>' . $row["opis"] . '  cena: ' . $row["cena"] . '$</p>
                        </div>';
                    }
                }
            }
            ?>

        </section>
    </div>
</div>

</body>

</html>