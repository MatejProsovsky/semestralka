<?php /** @var Array $data */
use App\Models\acc;
use App\Models\comment;
$article = $data['article'];
$comments = $data['comments'];
$comm = $data['comment'];
?>

<div class="container" style="cursor: auto">
    <header >
        <img style="width: calc(100% - 40px);margin-left: calc(20px);margin-right: calc(20px);" src="<?= $article->getImage() ?>" alt="img">
    </header>
    <main >
        <div style="margin-left: 2vw;margin-right: 2vw;display: block;width: auto;color: #cccccc" >
            <h1 style="color: whitesmoke"><?= $article->getTitle() ?></h1>
            <p><?= $article->getSummary() ?></p>
            <p><?= $article->getSection1() ?></p>
            <p><?= $article->getSection2() ?></p>
            <p><?= $article->getSection3() ?></p>
            <p><?= $article->getSection4() ?></p>
            <p><?= $article->getSection5() ?></p>
            <footer style="text-decoration: none;color: darkcyan">
                <p>Zdroj :  <a style="text-decoration: none;color: cyan" href="<?= $article->getSource() ?>" target="_blank"><?= $article->getSource() ?></a> </p>
            </footer>
            <?php
            if(isset($_SESSION['id'])) {
                $acc = acc::getOne($_SESSION['id']);
                if ($acc->getUsername() == 'admin' || $_SESSION['id'] == $article->getIDUser()) { ?>
                    <a href="?c=articles&a=modifyFinalArticle&id=<?= $article->getID() ?>" style="position: relative;top: -5px;font-size: 18px; outline: 4px inset orange;outline-offset: 2px;">Upraviť</a>
                <?php   }
            }?>
        </div>

        <div style="background-color: darkcyan;width: 100%;height: 5px;top: 20px"></div>
        <div style="width: 100%;height: 20px;top: 5px"></div>
        <h1 style="margin-left: 2vw">Komentáre</h1>
        <?php if (isset($_SESSION['id'])) { ?>
                <form method="post" action="?c=comment&a=addComment&id=<?= $article->getID() ?>" id="comForm">
                    <textarea type="text" style="position:relative; left: 2vw; background-color: black; color: #cccccc;width: 50vw;align-content: center" required name="content" rows="3" onfocus="this.value=''">Pridať komentár</textarea>
                    <button type="submit" style="position: relative;left: 2vw;top: -20px;color: cyan;background-color: black;height: 40px;width: 100px;font-size: 15px;cursor: pointer">Komentovať</button>
                </form>
        <?php } else { ?>
                 <h3 style="margin-left: 2vw;" > Prosím prihláste sa pre možnosť pridania komentáru.</h3>
                 <a href="?c=acc&a=log" style="margin-left: 2vw;font-size: 21px" > Prihlásiť</a>
                 <div style="background-color: #1f2833;width: 100%;height: 15px;top: 20px"></div>
        <?php } ?>

        <!--komentare-->
        <?php foreach($comments as $comment) {
                if($comment->getIDFinalArticle() == $article->getID()) {
                    if ($comm == $comment->getID()) { ?>
                        <div style="border-color: darkcyan;border-style: solid;width:auto;margin-right: 2vw;margin-left: 2vw;display: block;height: auto">
                            <h3 style="margin-left: 2vw;"><i class='fas' style="color: orange">&#xf406;</i> <?= $comment->getUsername() ?></h3>
                            <p style="margin-left: 2vw;font-size: 13px;color: darkcyan"> <?= $comment->getDate() ?> </p>
                            <div style ="background-color: cyan;width:auto;display: block;height: 2px"></div>
                            <form method="post" action="?c=comment&a=modifyComment&id=<?= $comment->getID() ?>" id="comFormMod">
                                <textarea type="text" style="position:relative; background-color: black; color: #cccccc;width: 50vw;align-content: center" required name="content" rows="3"><?= $comment->getContent() ?></textarea>
                                <button type="submit" style="position: relative;top: -30px;color: cyan;background-color: black;height: 40px;width: 100px;font-size: 15px;cursor: pointer">Upraviť komentár</button>
                            </form>
                        </div>
                  <?php } else { ?>
                        <div style="border-color: darkcyan;border-style: solid;width:auto;margin-right: 2vw;margin-left: 2vw;display: block;height: auto">
                            <h3 style="margin-left: 2vw;"><i class='fas' style="color: orange">&#xf406;</i> <?= $comment->getUsername() ?></h3>
                            <p style="margin-left: 2vw;font-size: 13px;color: darkcyan"> <?= $comment->getDate() ?> </p>
                            <div style ="background-color: cyan;width:auto;display: block;height: 2px"></div>
                            <p style="color: whitesmoke;margin-left: 2vw"><?= $comment->getContent() ?></p>
                        </div>
                  <?php }
                     if (isset($_SESSION['id'])) {
                            $acc = acc::getOne($_SESSION['id']);
                            if ($acc->getUsername() == "admin" || $acc->getUsername() == $comment->getUsername()) {?>
                                <a style="margin-left: 2vw;" href="?c=home&a=article&id=<?= $article->getID() ?>&comment=<?=$comment->getID() ?>">Upraviť komentár</a>
                                <a style="margin-left: 2vw;" href="?c=comment&a=deleteComment&id=<?= $comment->getID() ?>" onclick="return confirm('Si is istý že chceš zmazať komentár?')">Zmazať komentár</a>
                            <?php } else { ?>
                                <a style="margin-left: 2vw;" href="#">&nbsp;</a>
                            <?php }
                          } else { ?>
                        <a style="margin-left: 2vw;" href="#">&nbsp;</a>
                        <?php } ?>
                <?php }
              }?>
    </main>
</div>
