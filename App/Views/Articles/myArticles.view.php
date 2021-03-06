<?php /** @var Array $data */

use App\Models\acc; ?>

<?php if(isset($_SESSION['id'])) {
    $acc = acc::getOne($_SESSION['id']);
    if ($acc->getUsername() == 'admin') { ?>
        <h2 style="color: cyan;top: 30px;position: relative;left:20vw;width: 180px">Všetky články</h2>
    <?php   } else { ?>
        <h2 style="color: cyan;top: 30px;position: relative;left:20vw;width: 180px">Moje články</h2>
        <?php }
    ?>
<?php }?>

<div class="container">
    <main class="grid">
        <?php foreach (array_reverse($data['articles']) as $article) {
            if ($article->getIDUser() != $acc->getID() && $acc->getUsername() != 'admin') {
                continue;
            }?>
            <article>
                <a href="?c=home&a=myArticle&id=<?= $article->getID() ?>" style="text-decoration: none;color: cyan">
                    <img src="<?= $article->getImage() ?>" alt="photo">
                    <div class="text">
                        <h3><?= $article->getTitle() ?></h3>
                        <p><?= $article->getSummary() ?></p>
                    </div>

                </a>
                <?php if(isset($_SESSION['id'])) {
                    $acc = acc::getOne($_SESSION['id']);
                    if ($acc->getUsername() == 'admin') {
                        if ($article->getIsPublished() == 0) {?>
                            <a href="?c=articles&a=publish&id=<?= $article->getID() ?>" style="position: relative; left: 10px">Zverejniť</a>
                            <a href="?c=articles&a=modifyArticle&id=<?= $article->getID() ?>" style="position: relative; left: 15px" >Upraviť</a>
                    <?php  } else { ?>
                            <a href="?c=articles&a=publish&id=<?= $article->getID() ?>" style="position: relative; left: 10px">Stiahnuť</a>
                <?php  } }?>

                <?php if ($acc->getUsername() == 'admin') {
                        $id = $article->getIdUser();
                        $account = acc::getOne($id);
                        ?>
                    <p  style="position: relative; left: 10px">Pridal <?=  $account->getUsername()?></p>
                  <?php  } ?>
            </article>
                <?php } ?>
        <?php } ?>
    </main>
</div>
