<?php

namespace App\Controllers;

use \App\Models\comment;
use \App\Models\final_articles;
use \App\Models\articles;
/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {
        $articles = final_articles::getAll();

        if ($this->request()->getValue('division') == null || $this->request()->getValue('division') == 'home' ) {
            return $this->html(
                [ 'articles' => $articles ]
            );
        } else {
            $division =  $this->request()->getValue('division');
            $specificArticles = array();
            foreach ($articles as $article) {
                if ($article->getDivision() == $division) {
                    array_push($specificArticles,$article);
                }
            }
            return $this->html(
                [ 'articles' => $specificArticles ]
            );
        }
    }

    public function article()
    {
        $article = final_articles::getOne($this->request()->getValue('id'));
        $comment = $this->request()->getValue('comment');
        $comments = comment::getAll();
        return $this->html(
            ['article' => $article, 'comments' => $comments, 'comment' => $comment]
        );
    }

    public function myArticle()
    {
        $article = articles::getOne($this->request()->getValue('id'));

        return $this->html(
            ['article' => $article]
        );
    }


}