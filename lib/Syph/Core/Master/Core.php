<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Core
 *
 * @author bruno
 */
namespace Syph\Core\Master;
use Syph\Core\Master\SyphRegister;
class Core {
    protected function addObjectInApp($obj) {
        SyphRegister::add($obj, end(explode("\\",get_class($obj))));
    }
    protected function getObjectInApp($name) {
        return SyphRegister::get($name);
    }
    
    protected function initAppComponents() {
        
    }
}
