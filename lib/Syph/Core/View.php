<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Syph\Core;

/**
 * Description of View
 *
 * @author bruno
 */
class View {
    private static $vars = array();
    private $_conf;
    
    public static function getVar($key) {
        return self::$vars[$key];
    }
    
    public static function getVars() {
        return self::$vars;
    }

    public static function setVars($key,$value) {
        self::$vars[$key] = $value;
    }
    
    function getConf() {
        return $this->_conf;
    }

    function setConf($conf) {
        $this->_conf = $conf;
    }



}
