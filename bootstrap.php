<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/08/2015
 * Time: 12:02
 */
define("DS",DIRECTORY_SEPARATOR);
define("APP_DIR",substr(strrchr(dirname(__FILE__),DS),1));
define("APP_REAL_PATH", realpath(dirname(__FILE__)));
//Include Autoload
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/autoload.php';


$env = include_once('env.php');
$loaded = new \Syph\AppBuilder\Environment();
$loaded->setEnv($env);

//Start Routes
foreach($env['packages'] as $name => $path) {
    $loader = new \Syph\Autoload\ClassLoader($name, $path);
    $loader->register();
    $loaded->setLoaded($loader);
}

include_once('routing.php');

return $loaded;
//$app = new AppKernel($env);
