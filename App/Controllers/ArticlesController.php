<?php

namespace App\Controllers;

use \App\Models\final_articles;
use \App\Models\articles;
use \App\Models\comment;

class ArticlesController extends AControllerRedirect
{
    public function index()
    {
    }

    public function myArticles() {
        $articles = articles::getAll();
        return $this->html([
            'articles' => $articles
        ]);
    }

    public function modifyArticle() {

        $article = articles::getOne($this->request()->getValue('id'));

        if (isset($_POST['title'])){
            $article->setTitle($_POST['title']);
            $article->setSummary($_POST['summary']);
            $article->setSection1($_POST['section_1']);
            $article->setSection2($_POST['section_2']);
            $article->setSection3($_POST['section_3']);
            $article->setSection4($_POST['section_4']);
            $article->setSection5($_POST['section_5']);
            $article->setSource($_POST['source']);
            $article->setImage($_POST['image']);
            $article->setDivision($_POST['division']);
            $article->setIsPublished(0);
            $article->save();
        }

        return $this->html([
            'Article' => $article
        ]);
    }

    public function modifyFinalArticle() {

        $article = final_articles::getOne($this->request()->getValue('id'));
        if (isset($_POST['title'])){
            $article->setTitle($_POST['title']);
            $article->setSummary($_POST['summary']);
            $article->setSection1($_POST['section_1']);
            $article->setSection2($_POST['section_2']);
            $article->setSection3($_POST['section_3']);
            $article->setSection4($_POST['section_4']);
            $article->setSection5($_POST['section_5']);
            $article->setSource($_POST['source']);
            $article->setImage($_POST['image']);
            $article->setDivision($_POST['division']);
            $article->save();
        }

        return $this->html([
            'Article' => $article
        ]);
    }


    public function deleteArticle(){
        $article = articles::getOne($this->request()->getValue('id'));
        $finalArticles = final_articles::getAll();
        foreach ($finalArticles as $art) {
            if ($art->getIDArticle() == $article->getID()) {
                final_articles::deleteFinalArticle($art->getID());
                break;
            }
        }
        $article->delete();
        $this->redirect('articles','myArticles');

    }

    public function deleteFinalArticle(){
        final_articles::deleteFinalArticle($this->request()->getValue('id'));
        $this->redirect('home');

    }

    public function publish() {
        $article = articles::getOne($this->request()->getValue('id'));
        $finalArticles = final_articles::getAll();
        $notInFinal = true;
        foreach($finalArticles as $art) {
            if ($article->getID() == $art->getIDArticle()) {
                $notInFinal = false;
                if($article->getIsPublished() == 1) {
                    $article->setIsPublished(0);
                    $article->save();
                    final_articles::deleteFinalArticle($art->getID());
                    $this->redirect('articles','myArticles');
                }
                if($article->getIsPublished() == 0)  {
                    $art->setTitle($article->getTitle());
                    $art->setSummary($article->getSummary());
                    $art->setSection1($article->getSection1());
                    $art->setSection2($article->getSection2());
                    $art->setSection3($article->getSection3());
                    $art->setSection4($article->getSection4());
                    $art->setSection5($article->getSection5());
                    $art->setSource($article->getSource());
                    $art->setImage($article->getImage());
                    $art->setDivision($article->getDivision());
                    $art->setIDArticle($article->getID());
                    $art->save();
                    $this->redirect('articles','myArticles');
                }
            }
        }

        if ($notInFinal){
            $finalArticle = new final_articles($article->getIDUser(), $article->getTitle(),$article->getSummary(), $article->getSection1(), $article->getSource(),
                $article->getImage(), $article->getSection2() ,$article->getSection3(),$article->getSection4(),$article->getSection5() ,$article->getDivision(), $article->getID());
            $article->setIsPublished(1);
            $article->save();
            $finalArticle->save();
        }

        $this->redirect('articles','myArticles');
    }

    public function add() {
        return $this->html(['error' => $this->request()->getValue('error')]);
    }


    public function addArticle()
    {
        if (!empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['section_1']) && !empty($_POST['source']) && !empty($_POST['division']) ){
            $title=$_POST['title'];
            $summary=$_POST['summary'];
            $section_1=$_POST['section_1'];
            $source=$_POST['source'];
            $division=$_POST['division'];
            $ID_user=$_SESSION['id'];
            if (!empty($_POST['section_2'])) {
                $section_2=$_POST['section_2'];
            } else {
                $section_2='';
            }
            if (!empty($_POST['section_3'])) {
                $section_3=$_POST['section_3'];
            } else {
                $section_3='';
            }
            if (!empty($_POST['section_4'])) {
                $section_4=$_POST['section_4'];
            } else {
                $section_4='';
            }
            if (!empty($_POST['section_5'])) {
                $section_5=$_POST['section_5'];
            } else {
                $section_5='';
            }
            if (!empty($_POST['image'])) {
                $image=$_POST['image'];
            } else {
                $image='';
            }
            $article=new articles($ID_user, $title,$summary, $section_1, $source, $image, $section_2 ,$section_3,$section_4,$section_5 ,$division, 0);
            $article->save();
            $this->redirect('articles','myArticles');
        }
    }

    public function findArticle() {

        $articles=final_articles::getAll();

        $wanted=$this->request()->getValue('res');
        $hint="";
        if (strlen($wanted)>0) {
            $hint="";
            foreach ($articles as $article) {
                if(stristr($article->getTitle(),$wanted)) {
                    if($hint == "") {
                        $hint="<a href=?c=home&a=article&id=" .  $article->getID() . "&comment=0" ."' target='_blank'>" . $article->getTitle() . "</a>";
                    } else {
                        $hint=$hint . "<br /><a href=?c=home&a=article&id=" .  $article->getID() . "&comment=0" ."' target='_blank'>" . $article->getTitle() . "</a>";
                    }
                }
            }

        }

        if ($hint=="") {
            $response="žiadne výsledky";
        } else {
            $response=$hint;
        }

        echo $response;

        return 0;
    }
}


