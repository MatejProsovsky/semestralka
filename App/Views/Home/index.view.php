<?php /** @var Array $data */

use App\Models\acc; ?>


<div class="container">
    <main class="grid">
        <?php foreach (array_reverse($data['articles']) as $article) { ?>
            <article>
                <a href="?c=home&a=article&id=<?= $article->getID() ?>&comment=0" style="text-decoration: none;color: cyan">
                    <img src="<?= $article->getImage() ?>" alt="Sample photo">
                    <div class="text">
                        <h3><?= $article->getTitle() ?></h3>
                        <p><?= $article->getSummary() ?></p>
                    </div>

                </a>
                <?php

                if(isset($_SESSION['id'])) {
                    $acc = acc::getOne($_SESSION['id']);
                    if($acc->getUsername() == 'admin') { ?>
                    <a href="?c=articles&a=modifyFinalArticle&id=<?= $article->getID() ?>" style="position: relative; left: 15px" >Upraviť</a>
                <?php } }?>
            </article>
        <?php } ?>
    </main>
</div>
