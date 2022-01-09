<?php /** @var Array $data */
use App\Models\acc;
use App\Models\comment;
$article = $data['article'];
$comments = $data['comments'];

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
            /*if(isset($_SESSION['id'])) {
                $acc = acc::getOne($_SESSION['id']);
                if ($acc->getUsername() == 'admin' || $_SESSION['id'] == $article->getUserId()) { ?>
                    <a href="?c=articles&a=modifyArticle&id=<?= $article->getID() ?>" style="color: orange">Upraviť</a>
                <?php   }
            }*/?>
        </div>

        <div style="background-color: darkcyan;width: 100%;height: 5px;top: 20px"></div>
        <div style="width: 100%;height: 20px;top: 5px"></div>
        <h1 style="margin-left: 2vw">Komentáre</h1>

        <form method="post" action="?c=comment&a=addComment&id=<?= $article->getID() ?>" id="comForm">
            <textarea type="text" style="position:relative; left: 2vw; background-color: black; color: #cccccc;width: 50vw;align-content: center" required name="content" rows="3">Pridať komentár</textarea>
            <button type="submit" style="position: relative;left: 2vw;top: -20px;color: cyan;background-color: black;height: 40px;width: 100px;font-size: 15px;cursor: pointer">Komentovať</button>
        </form>

        <!--komentar-->
        <?php foreach($comments as $comment) {
                if($comment->getIDFinalArticle() == $article->getID()) {?>
                    <div style="border-color: darkcyan;border-style: solid;width:auto;margin-right: 2vw;margin-left: 2vw;display: block;height: auto">
                        <h3 style="margin-left: 2vw;"> <?php $comment->getUsername() ?> </h3>
                        <div style ="background-color: cyan;width:auto;display: block;height: 2px"></div>
                        <p style="color: whitesmoke;margin-left: 2vw"><?php $comment->getContent() ?></p>
                    </div>
                <?php }
              }?>
    </main>
</div>
