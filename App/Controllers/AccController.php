<?php

namespace App\Controllers;

use \App\Models\acc;
use App\account;
use App\Models\final_articles;
use http\Exception\BadUrlException;

class AccController extends AControllerRedirect
{
    public function index()
    {
    }

    public function allAccounts() {
        $accounts = acc::getAll();

        return $this->html(['accounts' => $accounts]);
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

        if ($logged == 1) {
            $this->redirect('home');
        } else if ($logged == 0){
            $this->redirect('acc','log',['error' => 'Zlé meno alebo heslo!']);
        } else {
            $this->redirect('acc','log',['error' => 'Účet bol zabanovaný!']);
        }

    }

    public function banAcc() {
        $id = $this->request()->getValue('id');
        $acc = acc::getOne($id);
        if ($acc->getBanned() == 1) {
            $acc->setBanned(0);
        } else {
            $acc->setBanned(1);
        }
        $acc->save();
        $this->redirect('acc','allAccounts');
    }

    public function modifyPro() {
        $acc = acc::getOne($_SESSION['id']);

        if ($acc->getUsername() == 'admin') {
            $id = $this->request()->getValue('id');
            $acc = acc::getOne($id);
        }

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

        if (isset($_POST['password'])){
            $acc->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $acc->save();

        }

        return $this->html([
            'Acc' => $acc
        ]);
    }
    public function deleteAcc(){
        $acc = acc::getOne($_SESSION['id']);

        if ($acc->getUsername() == 'admin') {
            $id = $this->request()->getValue('id');
            $acc = acc::getOne($id);
        }
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
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $account = new Acc($username, $email, $pass);
                $account->save();

                $this->redirect('acc','log');
            }
        }
    }

    public function findAccount() {

        $accounts=acc::getAll();

        $wanted=$this->request()->getValue('res');
        $hint="";
        if (strlen($wanted)>0) {
            $hint = "<p>Užívaťeľské účty :</p>";
            foreach ($accounts as $account) {
                if (stristr($account->getUsername(), $wanted)) {
                    if ($account->getBanned() == 1) {
                        $hint=$hint . "<a href=?c=acc&a=modifyPro&id=" .  $account->getID() . "' target='_blank' class='accounts'>". "Užvateľské meno : " . $account->getUsername() . "&nbsp;&nbsp;&nbsp;&nbsp;" . "email : " . $account->getEmail() ."&nbsp;&nbsp;&nbsp;&nbsp;".  "<span style='color: red'>Účet zabanovaný</span>" ."</a>";
                    } else {
                        $hint = $hint . "<a href=?c=acc&a=modifyPro&id=" . $account->getID() . "' target='_blank' class='accounts' >" . "Užvateľské meno : " . $account->getUsername() . "&nbsp;&nbsp;&nbsp;&nbsp;" . "email : " . $account->getEmail() . "</a>";
                    }
                }
            }
        }
        if (stristr($wanted,"zadajte užívateľské meno") || empty($wanted)) {
            $hint="<p>Užívaťeľské účty :</p>";
            foreach ($accounts as $account) {
                if($account->getBanned() == 1) {
                    $hint=$hint . "<a href=?c=acc&a=modifyPro&id=" .  $account->getID() . "' target='_blank' class='accounts'>". "Užvateľské meno : " . $account->getUsername() . "&nbsp;&nbsp;&nbsp;&nbsp;" . "email : " . $account->getEmail() ."&nbsp;&nbsp;&nbsp;&nbsp;".  "<span style='color: red'>Účet zabanovaný</span>" ."</a>";
                } else {
                    $hint = $hint . "<a href=?c=acc&a=modifyPro&id=" . $account->getID() . "' target='_blank' class='accounts' >" . "Užvateľské meno : " . $account->getUsername() . "&nbsp;&nbsp;&nbsp;&nbsp;" . "email : " . $account->getEmail() . "</a>";
                }
            }
        }

        if ($hint=="" || $hint == "<p>Užívaťeľské účty :</p>") {
            $response=$hint . "žiadne výsledky";
        } else {
            $response=$hint;
        }

        echo $response;

        return 0;
    }


    public function logout() {
        account::logout();
        $this->redirect('home');
    }
}

