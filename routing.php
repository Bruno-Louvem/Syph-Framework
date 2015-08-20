<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/08/2015
 * Time: 12:47
 * Description: Arquivo de rotas do CRUD
 */
use Syph\Routing\Router;

Router::route('', function(){
    $controller = 'HomeController';
    return array('controller'=>$controller,'action'=>'index');
});
