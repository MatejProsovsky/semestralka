<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../public/css.css"/>
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
    <a href="?c=home">Domov</a>
    <a href="#">Procesory</a>
    <a href="#">Matičné Dosky</a>
    <a href="#">Pamäte</a>
    <a href="#">Grafické Karty</a>
    <a href="#">Smartphóny</a>
    <a href="#">Software</a>
    <a href="#">TV</a>
    <a href="#">Notebooky</a>
    <a href="#">Iné</a>

</div>

<div style="background-color: black;width: 100%;height: 50px;position: fixed;top: 0px;z-index: 10">
    <span class = "buttonMenu" style="top:5px" onclick="if (sidenav == 0) {openNav()} else {closeNav()} ">&#9776; TechNews</span>

    <div class="dropdown" style="left: 150px;top: 17px;float: left">
        <a class="dropbtn"><i class='fas fa-search' id="fas"></i></a>
        <div class="dropdown-contentsearch" id="search">
            <form action="" style="position:relative;top: 5px;font-size: 20px" >
                <input class="inputSearch" style="color: #cccccc;background-color: #111111;box-shadow: 0px 8px 16px 0px rgba(0,0,0,1);font-size: 18px" type="text" onkeyup="showResult(this.value)">
            </form>
            <div id="livesearch"></div>
        </div>
    </div>
    <?php

    use App\Models\acc;

    if (\App\account::isLogged()) {
        ?>
        <div class="login" style="background-color:rgba(0, 0, 0, 0.5);">
            <div class="dropdown" style="float:right;">
                <a class="dropbtn"><i class='fas' id="fas">&#xf406;   <?php echo \App\account::getName()?></i></a>
                <div class="dropdown-content" >
                    <a href="?c=acc&a=pro">Profil</a>

                    <a href="?c=articles&a=add">Pridať článok</a>
                    <?php
                    $acc = acc::getOne($_SESSION['id']);
                    if ($acc->getUsername() == 'admin' ) { ?>
                        <a href="?c=articles&a=myArticles">Všetky články</a>
                    <?php
                    } else {
                    ?>
                        <a href="?c=articles&a=myArticles">Moje články</a>
                    <?php
                    }
                    ?>
                    <a href="?c=acc&a=logout">Odhlásiť</a>
                </div>
            </div>

        </div>
        <?php
    } else {
        ?>
        <div class="login" style="background-color:rgba(0, 0, 0, 0.5);">
            <a href="?c=acc&a=log">
                <i class='fas' id="fas">&#xf406; </i>Prihlásiť
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


