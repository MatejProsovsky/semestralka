<?php

namespace App\Controllers;

use \App\Models\comment;
use \App\Models\acc;
use App\account;

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
            $date = date("Y-m-d h:i:sa");
            $comment = new comment($id_final_article, $username, $content, $date);
            $comment->save();
            $this->redirect('home','article', ['id' => $id_final_article]);
        }
    }

    public function modifyComment() {

    }

    public function deleteComment() {

    }
}


