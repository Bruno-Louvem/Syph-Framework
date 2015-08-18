<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/08/2015
 * Time: 12:02
 */

include_once('bootstrap.php');
include_once('routing.php');
$response = $app->handleRequest(new Http());

try{
    echo $app->getResponse();
} catch(Exception $e){
    echo $e->getMessage();
}

//echo $_GET['path'];