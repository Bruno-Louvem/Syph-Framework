<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/08/2015
 * Time: 14:48
 */
namespace DemoApp\Controller;


use Syph\Controller\BaseController;
use Syph\View\View;
use Syph\View\Renderer;

class HomeController extends BaseController
{
    public function index(){
        $title = 'Syph';
        return View::render(new Renderer('DemoApp:index.php'),compact('title'));
        //return "Syph";
    }

}