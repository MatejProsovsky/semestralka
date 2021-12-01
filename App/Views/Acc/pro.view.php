
<?php /** @var Array $data */ ?>
<div class="box">
    <form method="post">
        <span class="text-center">Profil</span>
        <div class="prof">
            <label>Prihlasovacie meno : <?= $data['username'] ?></label>
        </div>
        <div class="prof">
            <label>eMail : <?= $data['email'] ?></label>
        </div>

        <a class="prof" href="?c=acc&a=modifyPro" style="margin-top: 20%; border: 2px solid cyan;left: 60px;position: relative;padding: 7px;">Upraviť profil</a>

    </form>

</div>
