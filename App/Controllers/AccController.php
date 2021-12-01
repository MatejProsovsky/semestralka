<?php

namespace App\Controllers;

use \App\Models\acc;
use App\account;

class AccController extends AControllerRedirect
{
    public function index()
    {
    }

    public function pro() {

        $acc = acc::getOne($_SESSION['id']);
        return $this->html([
            'username' => $acc->getUsername(),
            'email' => $acc->getEmail(),
            'password' => $acc->getPassword()
        ]);

    }

    public function log() {
        return $this->html(
            ['error' => $this->request()->getValue('error')]
        );
    }

    public function login()
    {
        $username = $this->request()->getValue('username');
        $password = $this->request()->getValue('password');

        $logged = account::Login($username, $password);

        if ($logged) {
            $this->redirect('home');
        } else {
            $this->redirect('acc','log',['error' => 'Zlé meno alebo heslo!']);
        }

    }

    public function modifyPro() {
        $acc = acc::getOne($_SESSION['id']);

        if (isset($_POST['username'])){
            $acc->setUsername($_POST['username']);
            $acc->setEmail($_POST['email']);
            $acc->save();

        }

        return $this->html([
            'Acc' => $acc
        ]);
    }

    public function pass() {

        $acc = acc::getOne($_SESSION['id']);

        if (isset($_POST['username'])){
            $acc->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $acc->save();

        }

        return $this->html([
            'Acc' => $acc
        ]);
    }
    public function deleteAcc(){
        $acc = acc::getOne($_SESSION['id']);
        $acc->delete();
        $this->redirect('home');
        $this->logout();
        exit();
    }

    public function add() {
        return $this->html(['error' => $this->request()->getValue('error')]);
    }


    public function register(){
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])  ){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $email=$_POST['email'];

            $accounts=Acc::getAll();
            $ok = 1;
            foreach ($accounts as $acc) {
                if ($acc->getUsername() == $username)
                {
                    $this->redirect('acc','add',['error' => 'Toto meno je už obsadené.']);
                    $ok = 0;
                    break;
                }
                if ($acc->getEmail()==$email) {
                    $this->redirect('acc','add',['error' => 'Účet s takýmto mailom už existuje.']);
                    $ok = 0;
                    break;
                }
            }
            if($ok == 1) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $account = new Acc($username, $email, $password);
                $account->save();

                $this->redirect('acc','log');
            }
        }
    }


    public function logout() {
        account::logout();
        $this->redirect('home');
    }
}

