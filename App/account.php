<?php

namespace App;

use App\Models\acc;

class account
{
    public static function login($username, $password) {
        $accounts=Acc::getAll();
        foreach ($accounts as $acc) {
            if ($acc->getBanned() == 1) {
                return 2;
            }
            if ($acc->getUsername() == $username)
            {
                if (password_verify($password, $acc->getPassword())) {
                    $_SESSION['id'] = $acc->getID();
                    return 1;
                } else {
                    return 0;
                }

            }
        }
        return false;

    }

    public static function profile() {
        $acc = acc::getOne($_SESSION['id']);
        return $acc;
        $accounts=Acc::getAll();
        foreach ($accounts as $acc) {
            if ($_SESSION['id'] == $acc->getID()) {
                return $acc->getID();
            } else {
                return 0;
            }
        }
    }

    public static function logout() {
        unset($_SESSION['id']);
        session_destroy();
    }

    public static function isLogged() {
        return isset($_SESSION['id']);
    }

    public static function getName() {
        $acc = acc::getOne($_SESSION['id']);
        return (self::isLogged() ? $acc->getUsername() : "");
    }


}
