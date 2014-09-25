<?php

header('Content-Type: text/html; charset=utf-8');
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));

//inicialização do framework
require '..'.DS.'config'.DS.'bootstrap.php';

//inicialização do aplicativo
try {
    if($controller->initApp()){
        $controller->executeApp();
    }else{
        throw new Exception;
    }
    
} catch (Exception $exc) {
    echo $exc->getMessage();
    echo $exc->getTraceAsString();
}






