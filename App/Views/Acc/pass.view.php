<?php /** @var Array $data */
/** @var \App\Models\acc $acc */

use App\Models\acc;

$acc = $data['Acc'];?>

<div class="box" style="top: 400px">
    <form method="post" id="passForm">
        <span class="text-center" >Zmeniť heslo</span>
        <div class="prof" id="errors" style="color: goldenrod"></div>
        <div class="input-container">
            <input type="text" required name="username" value="<?=$acc->getUsername()?>"/>
            <label>Prihlasovacie meno</label>
        </div>
        <div class="input-container">
            <input type="password" required name="password" value=""/>
            <label>Nové heslo</label>
        </div>
        <div class="input-container">
            <input type="password" required name="passwordNew" value=""/>
            <label>Potvrdenie nového hesla</label>
        </div>

        <button type="submit" class="btn">Zmeniť heslo</button>

    </form>
    <a href="?c=acc&a=deleteAcc" onclick="return confirm('Are you sure?')" style="background-color:black;font-size: 14.5px ; color: red; padding: 10px 20px;left: 60px;position: relative;top: 10px">Zmazať účet</a>
    <script>
        document.getElementById("passForm").onsubmit = checkForm;

        function checkForm() {
            let pass = document.getElementsByName("password")[0];
            let passNew = document.getElementsByName("passwordNew")[0];
            if (pass.value.length < 8 ) {
                let textNode = document.createTextNode("Heslo musí mať aspon 8 znakov!");
                document.getElementById('errors').appendChild(textNode);
                return false;
            }
            if (pass.value != passNew.value ) {
                let textNode = document.createTextNode("Heslá sa nezhodujú!");
                document.getElementById('errors').appendChild(textNode);
                return false;
            }
        }
    </script>
</div>
