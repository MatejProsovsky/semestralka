<?php /** @var Array $data */
/** @var \App\Models\final_articles $article */

use App\Models\final_articles;
$article = $data['Article'];
?>

<div class="box" style="top: 650px;width: 50vw;z-index: 0" >

    <form method="post" action="?c=articles&a=modifyFinalArticle&id=<?= $article->getID() ?>" id="regForm">
        <div class="prof" id="errors" style="color: goldenrod"></div>
        <div class="input-container">
            <input type="text"  required name="title" value="<?=$article->getTitle()?>"/>
            <label>Názov článku (povinné)</label>
        </div>
        <div class="input-container">
            <input type="text"  name="image" value="<?=$article->getImage()?>"/>
            <label>Obrázok</label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  required name="summary" ><?=$article->getSummary()?></textarea>
            <label style="top: -23px">Úvodný text (povinné)</label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  required name="section_1" ><?=$article->getSection1()?></textarea>
            <label style="top: -23px">1. odsek (povinné)</label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  name="section_2" ><?=$article->getSection2()?></textarea>
            <label style="top: -23px">2. odsek </label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  name="section_3" ><?=$article->getSection3()?></textarea>
            <label style="top: -23px">3. odsek </label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  name="section_4"> <?=$article->getSection4()?></textarea>
            <label style="top: -23px">4. odsek </label>
        </div>
        <div class="input-container" style="top: 10px">
            <textarea type="textarea" style="background-color: black; color: #cccccc;width: 48vw;align-content: center" rows="5"  name="section_5"><?=$article->getSection5()?></textarea>
            <label style="top: -23px">5. odsek </label>
        </div>
        <div class="input-container">
            <input type="text"  required name="source" value="<?=$article->getDivision()?>"/>
            <label>Zdroj (povinné)</label>
        </div>
        <div class="input-container" style="top: 10px">
            <label style="top: -23px">Sekcia (povinné)</label>
            <select name="division" id="division" style="width: 20vw;background-color: black;color: #cccccc" >
                <option value="Procesory" <?php if($article->getDivision() == 'Procesory') { ?> selected <?php }?>>Procesory</option>
                <option value="Matičné dosky" <?php if($article->getDivision() == 'Matičné dosky') { ?> selected <?php }?>>Matičné dosky</option>
                <option value="Pamäte" <?php if($article->getDivision() == 'Pamäte') { ?> selected <?php }?>>Pamäte</option>
                <option value="Grafické karty" <?php if($article->getDivision() == 'Grafické karty') { ?> selected <?php }?>>Grafické karty</option>
                <option value="Smartphóny" <?php if($article->getDivision() == 'Smartphóny') { ?> selected <?php }?>>Smartphóny</option>
                <option value="Software" <?php if($article->getDivision() == 'Software') { ?> selected <?php }?>>Software</option>
                <option value="TV" <?php if($article->getDivision() == 'TV a Monitory') { ?> selected <?php }?>>TV a Monitory</option>
                <option value="Notebooky" <?php if($article->getDivision() == 'Notebooky') { ?> selected <?php }?>>Notebooky</option>
                <option value="Iné" <?php if($article->getDivision() == 'Iné') { ?> selected <?php }?>>Iné</option>
            </select>
        </div>

        <button type="submit" class="btn" style="top: -10px;left: 10px">Upraviť článok</button>


    </form>
    <a href="?c=articles&a=deleteFinalArticle&id=<?= $article->getID() ?>" onclick="return confirm('Si is istý že chceš zmazať článok?')" style="background-color:black;font-size: 14.5px ; color: red; padding: 10px 20px;left: 15px;position: relative;top: 10px">Zmazať článok</a>
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
