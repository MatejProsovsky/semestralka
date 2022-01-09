<?php /** @var Array $data */

use App\Models\acc; ?>


<div class="container">
    <main class="grid">
        <?php foreach ($data['articles'] as $article) { ?>
            <article>
                <a href="?c=home&a=article&id=<?= $article->getID() ?>" style="text-decoration: none;color: cyan">
                    <img src="<?= $article->getImage() ?>" alt="Sample photo">
                    <div class="text">
                        <h3><?= $article->getTitle() ?></h3>
                        <p><?= $article->getSummary() ?></p>
                    </div>

                </a>
                <?php /*if(isset($_SESSION['id'])) {
                        $acc = acc::getOne($_SESSION['id']);
                        if ($acc->getUsername() == 'admin' || $_SESSION['id'] == $article->getUserId()) { ?>
                            <a href="?c=articles&a=modifyArticle&id=<?= $article->getID() ?>" style="color: orange">Upraviť</a>
                <?php   }
                      }*/?>
            </article>
        <?php } ?>
    </main>
</div>
