<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TechNews</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="semestralka/public/css.css">
    <script src="semestralka/public/js.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        body {
            font-family: "Lato", sans-serif;
            color: cyan;
            background: black;
        }

    </style>
</head>
<body onload="menuButton()" onresize="menuButton()">

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="?c=home">Domov</a>
    <a href="#">Procesory</a>
    <a href="#">Maticne Dosky</a>
    <a href="#">Pamate</a>
    <a href="#">Graficke Karty</a>
    <a href="#">Smartphony</a>
    <a href="#">Software</a>
    <a href="#">TV</a>
    <a href="#">Ine</a>
</div>

<div style="background-color: black;width: 100%;height: 50px;position: fixed;top: 0px">
    <span class = "buttonMenu" style="top:5px" onclick="openNav()">&#9776; TechNews</span>

    <?php
    if (\App\account::isLogged()) {
        ?>
        <div class="login" style="background-color:rgba(0, 0, 0, 0.5);">
            <div class="dropdown" style="float:right;">
                <a class="dropbtn"><i class='fas'>&#xf406;   <?php echo \App\account::getName()?></i></a>
                <div class="dropdown-content">
                    <a href="?c=acc&a=pro">Profil</a>
                    <a href="?c=acc&a=logout">Odhlásiť</a>
                </div>
            </div>

        </div>
        <?php
    } else {
        ?>
        <div class="login" style="background-color:rgba(0, 0, 0, 0.5);">
            <a href="?c=acc&a=log">
                <i class='fas'>&#xf406;</i> Prihlásiť
            </a>
        </div>
        <?php
    }
    ?>


</div>





<div class="row mt-2">
    <div class="col">
        <?= $contentHTML ?>
    </div>
</div>



</body>
</html>


