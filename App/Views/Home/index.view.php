<?php /** @var Array $data */

use App\Models\acc; ?>


<div class="container">
    <main class="grid">
        <?php foreach ($data['articles'] as $article) { ?>
            <article>
                <a href="?c=home&a=article&id=<?= $article->getID() ?>&comment=0" style="text-decoration: none;color: cyan">
                    <img src="<?= $article->getImage() ?>" alt="Sample photo">
                    <div class="text">
                        <h3><?= $article->getTitle() ?></h3>
                        <p><?= $article->getSummary() ?></p>
                    </div>

                </a>
                <a href="?c=articles&a=modifyFinalArticle&id=<?= $article->getID() ?>" style="position: relative; left: 15px" >Upraviť</a>
            </article>
        <?php } ?>
    </main>
</div>
