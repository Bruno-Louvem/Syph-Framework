<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewManager
 *
 * @author bruno
 */
namespace Syph\Core;

use Syph\Model\FileSystem\FileHandler;

class Response {
    public function __construct() {
        
    }
    public static function View($conf) {
        if(is_array($conf)){
            self::ViewFromArray($conf);
        }else{
            self::ViewFromString($conf);
        }
    }
    private static function ViewFromArray($conf) {
        $conf = $conf["template"][$conf["module"]];
        $viewPath = realpath(dirname(__FILE__)).DS."..".DS."..".DS."..".DS."web".DS.$conf['pack'];
        if(FileHandler::isDir($viewPath)){
            include $viewPath.DS.$conf['index'].".php";
        }
    }
    public static function ViewFromString($conf) {
        $loader = new \Twig_Loader_String();
        $twig = new \Twig_Environment($loader);
        echo $twig->render('{{ name }}!', array('name' => $conf));
    }
}
