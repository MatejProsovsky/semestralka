<?php /** @var Array $data */
/** @var \App\Models\acc $acc */

use App\Models\acc;

$accounts = $data['accounts'];
$accountsOnLoad = acc::getAll();
?>
<div class="container">
    <h1 style="margin: 15px">Všetky účty</h1>
    <form action="" style="position:relative;top: 5px;font-size: 20px;margin-left: 25px" >
        <label>Vyhľadávanie : </label>
        <input class="inputSearch" style="color: #cccccc;background-color: #111111;box-shadow: 0px 8px 16px 0px rgba(0,0,0,1);font-size: 18px" type="text" onfocus="this.value=''"  onkeyup="showProfiles(this.value)" value="zadajte užívateľské meno">
    </form>
    <a style="margin-left: 2vw;" href="#">&nbsp;</a>
    <div id="acclivesearch" style="margin: 15px;position: relative">
        <p>Užívaťeľské účty</p>
        <?php foreach ($accountsOnLoad as $acc) {
            ?>
            <a class="accounts" href=?c=acc&a=modifyPro&id=<?= $acc->getID() ?>" >Užvateľské meno : <?= $acc->getUsername()  ?>&nbsp;&nbsp;&nbsp;&nbsp; email : <?= $acc->getEmail()  ?>  <?php if($acc->getBanned() == 1) { ?> <span style="color: red">&nbsp;&nbsp;&nbsp;&nbsp;Účet zabanovaný</span> <?php } ?></a>
        <?php }


        ?>
    </div>
</div>
