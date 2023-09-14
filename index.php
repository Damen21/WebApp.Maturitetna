<?php
include_once 'header2.php'
?>
<!-- navigation -->
<div class="cont">
    <!-------------------------- left-sidebar --------------------->
    <div class="left-sidebar">
        <form action="index.php" method="GET">
            <select id="znamka" name="ib">
                <option value="yeezy">yeezy</option>
                <option value="jordan">jordan</option>
                <option value="converse">converse</option>
                <option value="adidas">adidas</option>
                <option value="nike">nike</option>
            </select>
            <input type="number" name="mk" placeholder="Manj kot">

            <button type="submit" name="submit">uporabi filtre</button>
        </form>
    </div>
    <!--------------------------main-content ---------------------->
    <div class="main-content">
        <section class="container">


            <?php
            include_once 'includes/dbh.inc.php';
            $src = "";
            if (isset($_GET["ib"])) {
                $src = " WHERE znamka = '" . $_GET["ib"] . "'";
            }
            if (isset($_GET["q"])) {
                if (isset($_GET["ib"])) {
                    $src .= " AND ime LIKE '%" . $_GET["q"] . "%'";
                } else
                    $src = " WHERE ime LIKE '%" . $_GET["q"] . "%'";
            }
            if(isset($_GET["mk"])){
                if(isset($_GET["q"])||isset($_GET["ib"])){
                    $src .= " AND cena < ".$_GET["mk"]."";
                }
                else{
                    $src = " cena < ".$_GET["mk"]."";
                }
            }
            $sql = "SELECT * FROM item" . $src . " ORDER BY uploadDate DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "sql stmt fail :(";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    if (isset($_SESSION["username"])) {
                        if (!($row["account_idaccount"] == $_SESSION['idaccount']))
                            {echo '<div class="item">
                        <img src="slike/userimg/' . $row["imgpath"] . '" alt="Girl in a jacket" width="400" height="400"">
                        <h2>' . $row["ime"] . '</h2>
                        <p>' . $row["opis"] . '<p>  cena: ' . $row["cena"] . '$</p> <form action="addtowatchlist.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="iid" value="' . $row["iditems"] . '">
                        <button type="submit" name="submit">Dodaj pod priljubljeno</button></form>
                        <form action="create_msg.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="sid" value="' . $_SESSION['idaccount'] . '">
                        <input type="hidden" name="rid" value="' . $row["account_idaccount"] . '">
                        <button type="submit" name="submit">Pošlji sporočilo</button></form>';
                        
                        if($_SESSION['idaccount']==10){
                        echo'<form action="deleteitemforadmin.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="iip" value="' .$row["imgpath"]. '">
                        <input type="hidden" name="iid" value="' .$row["iditems"]. '">
                        <button type="submit" name="submit">delete</button></form>';}
                        echo'</div>';
                    }
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