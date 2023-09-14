<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Naslov</title>
</head>

<body>
    <nav>
        <div class="nav-left">
            <img src="slike/logo.png" class="logo">
        </div>
        <div class="nav-mid">
            <div class="search-box">
                <form action="index.php" method="GET"> 
                    <button type="submit" name="submit"><img src="slike/search.png" alt=""></button>
                    <input name="q" type="text" placeholder="Search">
                </form>
            </div>
        </div>
        <div class="nav-right">
            <ul>
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<li><a href='auctionsite.php'>";
                    echo '<img src="slike/auction.png" alt="Auctionsite"></a></li>';
                    echo "<li><a href='profile.php'>";
                    echo '<img src="slike/accicon.png" alt="Profil"></a></li>';
                    echo "<li><a href='index.php'>";
                    echo '<img src="slike/home.png" alt="Home"></a></li>';
                    echo "<li><a href='includes/logout.inc.php'><img src='slike/logout.png'></a></li>";
                    echo "<li><a href='favourites.php'><img src='slike/favourite.png'></a></li>";
                    echo "<li><a href='dms.php'><img src='slike/chat.png'></a></li>";
                } else {
                    echo "<li><a href='index.php'>";
                    echo '<img src="slike/home.png" alt="Home"></a></li>';
                    echo "<li><a href='login.php'>Log in</a></li>";
                    echo "<li><a href='signup.php'>Sing up</a></li>";
                }
                ?>

            </ul>
        </div>
    </nav>