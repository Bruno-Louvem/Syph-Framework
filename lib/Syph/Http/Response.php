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
namespace Syph\Http;

use Syph\Core\Master\SyphRegister;
use Syph\Core\View;
use Syph\Model\FileSystem\FileHandler;

class Response {
    public function __construct() {
        
    }
    /**
     * Inicia a resposta da aplicação
     * @param View $view
     */
    public function responseApp(View $view) {
        if(is_array($view->getConf())){
            self::ViewFromArray($view);
        }else{
            self::ViewFromString($view);
        }
    }
    
    /**
     * 
     * @param type $view
     */
    private static function ViewFromArray($view) {
        $c = $view->getConf();
        $conf = $c["template"][SyphRegister::get('router')->getAction()];
        $allVars = self::prepareArrayVars($view);
        $viewPath = realpath(dirname(__FILE__)).DS."..".DS."..".DS."..".DS."web".DS.$conf['pack'];
        if(FileHandler::isDir($viewPath)){
            $loader = new \Twig_Loader_Filesystem($viewPath);
            $twig = new \Twig_Environment($loader);
            echo $twig->render($conf['index'].".twig", $allVars);
        }
    }
    
    public static function ViewFromString($view) {
        $c = $view->getConf();
        
        $loader = new \Twig_Loader_String();
        $twig = new \Twig_Environment($loader);
        echo $twig->render('{{ name }}!', array('name' => $c));
    }

    public static function prepareArrayVars(View $view) {
        $vars = View::getVars();
        if(is_array($vars)){
            return $vars;
        }else{
            return false;
        }
    }

}
