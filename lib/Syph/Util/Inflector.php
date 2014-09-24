<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inflector
 *
 * @author bruno
 */

namespace Syph\Util;

trait Inflector {

    public function upperCamelCase($string = null) {
        $string = strtolower($string);
        $string = ucwords($string);
        $string = str_replace(' ', '', $string);

        return $string;
    }

    public function slug($string = null, $separator = '-') {
        $string = strtolower($string);
        $string = str_replace(' ', $separator, $string);

        return $string;
    }

}
