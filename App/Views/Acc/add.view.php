<?php /** @var Array $data */ ?>

<div class="box">

    <form method="post" action="?c=acc&a=register" id="regForm">
        <span class="text-center">Registrácia</span>
        <div class="prof" id="errors" style="color: goldenrod"></div>
        <div class="input-container">
            <input type="text"  required name="username"/>
            <label>Prihlasovacie meno</label>
        </div>
        <div class="input-container">
            <input type="email"  required name="email" />
            <label>eMail</label>
        </div>
        <div class="input-container">
            <input type="password" required name="password"/>
            <label>Heslo (min 8 znakov)</label>
        </div>
        <?php
        if ($data['error'] != ""){
        ?>
        <html> <div class="wrongInput" style="top: 60px; left: 3vw">
            <?= $data['error'] ?>
        </div>
        <?php
        } else {
            ?>
            <html> <p><br/ ></p> </html>
            <?php
        }
        ?>
        <button type="submit" class="btn">Registrovať</button>


    </form>
    <script>
        document.getElementById("regForm").onsubmit = checkForm;

        function checkForm() {
            let name = document.getElementsByName("username")[0];
            let pass = document.getElementsByName("password")[0];
            if (name.value.length < 5 ) {
                let textNode = document.createTextNode("Meno musí mať aspon 5 znakov!");
                document.getElementById('errors').appendChild(textNode);
                return false;
            }
            if (pass.value.length < 8) {
                let textNode = document.createTextNode("Heslo musí mať aspon 8 znakov!");
                document.getElementById('errors').appendChild(textNode);
                return false;
            }
        }
    </script>

</div>
