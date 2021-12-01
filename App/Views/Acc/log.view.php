<?php /** @var Array $data */ ?>

<div class="box">
    <form method="post" action="?c=acc&a=login">
        <span class="text-center">Prihlásenie</span>
        <div class="input-container">
            <input type="text" required="" name="username"/>
            <label>Prihlasovacie meno</label>
        </div>
        <div class="input-container">
            <input type="password" required="" name="password"/>
            <label>Heslo</label>
        </div>

        <button type="submit" class="btn" style="left: 63px">Prihlásiť</button>
        <?php
        if ($data['error'] != ""){
        ?>
        <html> <div class="wrongInput" style="top: 70px; left: 22%">
            <?= $data['error'] ?>
        </div>
        <?php
        } else {
            ?>
        <html> <p><br/ ></p> </html>
        <?php
        }
        ?>
    </form>
    <a class = "btn" href="?c=acc&a=add" style="top:20px;left: 42px">Registrovat</a>
</div>
