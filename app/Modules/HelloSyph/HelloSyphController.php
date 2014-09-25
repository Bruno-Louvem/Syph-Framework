<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardController
 *
 * @author bruno
 */
namespace Modules\HelloSyph;

use Syph\Controller\ApplicationController;

class HelloSyphController extends ApplicationController{
    
    public function __construct($args) {
        $this->args = $args;
        $this->SyphLoaderConfig(dirname(__FILE__));
    }
    
    public function HelloSyph() {
        if($this->_config){
            $this->SyphCreateView();
        }
    }
    public function GenerateModule() {
        if($this->_config){
            $this->SyphCreateView();
        }
    }
}
