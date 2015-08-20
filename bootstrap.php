<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/08/2015
 * Time: 12:02
 */
define("DS",DIRECTORY_SEPARATOR);

include_once('app/AppKernel.php');

include_once('lib/Syph/Autoload/ClassLoader.php');
$env = include_once('env.php');

$app = new AppKernel($env);
