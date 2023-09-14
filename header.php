<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dms.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css">
    <title></title>
</head>

<body>
    <nav>
        <div class="nav-left">
            <img src="slike/logo.png" class="logo">
        </div>
        <div class="nav-mid">
            
            </div>
        </div>
        <div class="nav-right">
            <ul>
            <?php
                if (isset($_SESSION["username"])) {
                    echo "<li><a href='profile.php'>";
                    echo '<img src="slike/accicon.png" alt="Profil"></a></li>';
                    echo "<li><a href='index.php'>";
                    echo '<img src="slike/home.png" alt="Home"></a></li>';
                    echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
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