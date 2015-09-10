<?php
namespace Syph\AppBuilder;
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 24/08/2015
 * Time: 14:00
 */




use Syph\AppBuilder\Interfaces\BuilderInterface;

class AppBuilder implements BuilderInterface
{

    public function loadApp($path = null)
    {
        if(!is_null($path)){
            $configs = $this->loadConfigApp($path);
        }
        $configs = $this->loadConfigApp('app/config/config.php');

        return $configs;
    }

    public function loadConfigApp($path){
        if(file_exists($path)){
            return include_once($path);
        }
    }


}