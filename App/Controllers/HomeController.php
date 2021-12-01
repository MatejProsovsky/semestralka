<?php

namespace App\Controllers;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {
        return $this->html(
            []
        );
    }

    public function art1()
    {
        return $this->html(
            []
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