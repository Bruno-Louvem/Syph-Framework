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
    private $vars = array();
    
    function getVar($key) {
        return $this->vars[$key];
    }
    
    function getVars() {
        return $this->vars;
    }

    function setVars($key,$value) {
        $this->vars[$key] = $value;
    }


}
