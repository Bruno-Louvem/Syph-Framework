<?php

/**
 * Created by PhpStorm.
 * User: PSBI
 * Date: 12/08/2015
 * Time: 14:48
 */
use Syph\View\View;
use Syph\View\Renderer;

class HomeController
{
    public function index(){
        $title = 'Syph';
        return View::render(new Renderer('index.php'),compact('title'));
    }

}