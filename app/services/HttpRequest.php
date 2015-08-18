<?php

/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 13/08/2015
 * Time: 13:32
 */
include_once(realpath(dirname(__FILE__)).'/Interfaces/HttpRequestInterface.php');
class HttpRequest implements HttpRequestInterface
{

    public function serialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
    public function toArray(){
        return static::serialize();
    }
}