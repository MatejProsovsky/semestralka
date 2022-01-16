<?php /** @var Array $data */ ?>

<div class="box" style="top: 650px;width: 50vw;z-index: 0" >

    <form method="post" action="?c=articles&a=addArticle" id="regForm">
        <div class="prof" id="errors" style="color: goldenrod"></div>
        <div class="input-container">
            <input type="text"  required name="title"/>
            <label>Názov článku (povinné)</label>
        </div>
        <div class="input-container">
            <input type="text"  name="image" />
            <label>Obrázok</label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  required name="summary"></textarea>
            <label style="top: -23px">Úvodný text (povinné)</label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  required name="section_1"></textarea>
            <label style="top: -23px">1. odsek (povinné)</label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  name="section_2"></textarea>
            <label style="top: -23px">2. odsek </label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  name="section_3"></textarea>
            <label style="top: -23px">3. odsek </label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  name="section_4"></textarea>
            <label style="top: -23px">4. odsek </label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  name="section_5"></textarea>
            <label style="top: -23px">5. odsek </label>
        </div>
        <div class="input-container">
            <input type="text"  required name="source"/>
            <label>Zdroj (povinné)</label>
        </div>
        <div class="input-container" style="top: 10px">
            <label style="top: -23px">Sekcia (povinné)</label>
            <select name="division" id="division" style="width: 20vw;background-color: black;color: #cccccc">
                <option value="Procesory">Procesory</option>
                <option value="Matičnédosky">Matičné dosky</option>
                <option value="Pamäte">Pamäte</option>
                <option value="Grafickékarty">Grafické karty</option>
                <option value="Smartphóny">Smartphóny</option>
                <option value="Software">Software</option>
                <option value="TVaMonitory">TV a Monitory</option>
                <option value="Notebooky">Notebooky</option>
                <option value="Iné">Iné</option>
            </select>
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
        <button type="submit" class="btn" style="top: -10px;">Pridať článok</button>


    </form>
    <script>

        document.getElementById("regForm").onsubmit = checkForm;

        function checkForm() {
            let name = document.getElementsByName("username")[0];
            let pass = document.getElementsByName("password")[0];
            let passS = document.getElementsByName("passwordSubmit")[0];
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
            if (pass.value != passS.value) {
                let textNode = document.createTextNode("Heslá sa musia zhodovať!");
                document.getElementById('errors').appendChild(textNode);
                return false;
            }
            alert('Účet úspešne vytvorený.');
        }
    </script>

</div>v>