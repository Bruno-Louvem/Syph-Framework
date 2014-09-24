<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include realpath(dirname(__FILE__)).DS.'..'.DS.'vendor'.DS.'autoload.php';
include realpath(dirname(__FILE__)).DS.'..'.DS.'lib'.DS.'Syph'.DS.'Core'.DS.'Loader.php';
$lib_path = __DIR__.DS.'..'.DS.'lib';
$mod_path = __DIR__.DS.'..'.DS.'app';
$SyphLoader = new Loader('Syph',$lib_path);
$CoreLoader = new Loader('Syph\Base',$lib_path);
$BaseLoader = new Loader('Syph\Base',$lib_path);
$ControllerLoader = new Loader('Syph\Controller',$lib_path);
$DALLoader = new Loader('Syph\DataAccessLayer',$lib_path);
$ModelLoader = new Loader('Syph\Model',$lib_path);
$UtilLoader = new Loader('Syph\Util',$lib_path);
$ModulesLoader = new Loader('Modules',$mod_path);

$SyphLoader->register();
$CoreLoader->register();
$BaseLoader->register();
$ControllerLoader->register();
$DALLoader->register();
$ModelLoader->register();
$UtilLoader->register();
$ModulesLoader->register();
