<?php

/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/08/2015
 * Time: 16:10
 */
class View
{
    function render($file, $vars = array()) {

        extract($vars);

        ob_start();

        include $file;

        $renderedView = ob_get_clean();

        return $renderedView;
    }

}