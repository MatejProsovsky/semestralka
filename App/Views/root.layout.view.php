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
    <script type="text/javascript">
        $(document).on('click', 'a', function(event)
        {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('.page-content').animate({
                    scrollTop: $(hash).offset().top-50
                }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    </script>

</head>
<body onload="menuButton(); scroll(100)" onresize="menuButton()">

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="?c=home">Domov</a>
    <a href="#">Procesory</a>
    <a href="#">Matičné Dosky</a>
    <a href="#">Pamäte</a>
    <a href="#">Grafické Karty</a>
    <a href="#">Smartphóny</a>
    <a href="#">Software</a>
    <a href="#">TV</a>
    <a href="#">Notebooky</a>
    <a href="#">Ine</a>
</div>

<div style="background-color: black;width: 100%;height: 50px;position: fixed;top: 0px;z-index: 10">
    <span class = "buttonMenu" style="top:5px" onclick="openNav()">&#9776; TechNews</span>

    <?php

    use App\Models\acc;

    if (\App\account::isLogged()) {
        ?>
        <div class="login" style="background-color:rgba(0, 0, 0, 0.5);">
            <div class="dropdown" style="float:right;">
                <a class="dropbtn"><i class='fas'>&#xf406;   <?php echo \App\account::getName()?></i></a>
                <div class="dropdown-content">
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


