<?php

namespace App\Controllers;

use \App\Models\comment;
use \App\Models\acc;

class CommentController extends AControllerRedirect
{
    public function index()
    {
    }

    public function addComment() {
        if (!empty($_POST['content']) ){
            $id_final_article = $this->request()->getValue('id');
            $user = acc::getOne($_SESSION['id']);
            $username = $user->getUsername();
            $content = $_POST['content'];
            $date = date("d.m.Y H:i:s",strtotime('+1 hours'));
            $comment = new comment($id_final_article, $username, $content, $date);
            $comment->save();
            $this->redirect('home','article', ['id' => $id_final_article,'comment' => 0]);
        }
    }

    public function modifyComment() {
        $id = $this->request()->getValue('id');
        $comment = comment::getOne($id);
        $comment->setContent($_POST['content']);
        $comment->setDate(date("d.m.Y H:i:s",strtotime('+1 hours')));
        $comment->save();
        $this->redirect('home','article', ['id' => $comment->getIDFinalArticle(),'comment' => 0]);
    }

    public function deleteComment() {
        $id = $this->request()->getValue('id');
        $comment = comment::getOne($id);
        $comment->delete();
        $this->redirect('home','article', ['id' => $comment->getIDFinalArticle(),'comment' => 0]);
    }
}


