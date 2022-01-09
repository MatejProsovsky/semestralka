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
        return $this->html(
            [ 'articles' => $articles ]
        );
    }

    public function art1()
    {
        return $this->html(
            []
        );
    }

    public function article()
    {
        $article = final_articles::getOne($this->request()->getValue('id'));
        $comments = comment::getAll();
        return $this->html(
            ['article' => $article, 'comments' => $comments]
        );
    }

    public function myArticle()
    {
        $article = articles::getOne($this->request()->getValue('id'));

        return $this->html(
            ['article' => $article]
        );
    }

    public function art2()
    {
        return $this->html(
            []
        );
    }

    public function contact()
    {
        return $this->html(
            []
        );
    }

}