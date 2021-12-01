<?php /** @var Array $data */
/** @var \App\Models\acc $acc */

use App\Models\acc;

$acc = $data['Acc'];?>



<div class="box" id="form" style="top: 400px">
    <form method="post" id="modForm">
        <span class="text-center" >Zmeniť profil</span>
        <div class="prof" id="errors" style="color: goldenrod"></div>
        <div class="input-container">
            <input type="text" required name="username" value="<?=$acc->getUsername()?>"/>
            <label>Prihlasovacie meno</label>
        </div>
        <div class="input-container">
            <input type="email" required name="email" value="<?=$acc->getEmail()?>"/>
            <label>eMail</label>
        </div>


        <button type="submit" class="btn">Zmeniť profil</button>
        <a class="text-center" href="?c=acc&a=pass" style="margin-top: 20%; border: 2px solid cyan;left: 1px;position: relative;padding: 7px;font-size: 15px">Zmeniť heslo</a>

    </form>
    <a href="?c=acc&a=deleteAcc" onclick="return confirm('Si is istý že chceš zmazať účet?')" style="background-color:black;font-size: 14.5px ; color: red; padding: 10px 20px;left: 60px;position: relative;top: 10px">Zmazať účet</a>
    <script>

        document.getElementById("modForm").onsubmit = checkForm;

        function checkForm() {
            let name = document.getElementsByName("username")[0];
            if (name.value.length < 5 ) {
                let textNode = document.createTextNode("Meno musí mať aspon 5 znakov!");
                document.getElementById('errors').appendChild(textNode);
                return false;
            }
            alert('Údaje boli zmenené.');
        }
    </script>
</div>

