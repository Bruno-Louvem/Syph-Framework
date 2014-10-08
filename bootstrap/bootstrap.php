<?php
/**
 * Description of bootstrap
 *
 * @author bruno
 */

// inclusão do autoload
require_once 'defines.php';
require_once 'autoload.php';

use Syph\Core\Master\Core;
use Syph\Controller\FrontController;

Core::getCore();
//instancia do FrontController
$controller = new FrontController();
 

try {
    if($controller->initApp()){
        return $controller;
    }else{
        throw new Exception("Não foi possivel iniciar a aplicação erro crítico!");
    }
    
} catch (Exception $exc) {
    echo $exc->getMessage();
    echo $exc->getTraceAsString();
}


