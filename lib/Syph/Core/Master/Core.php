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
use Syph\Core\Request;
use Syph\Core\Response;
use Syph\Core\Router;
use Syph\Core\View;
use Syph\Model\DB\DB;
class Core {
    
    protected $_config;
    
    
    public function __construct() {
        $this->initAppComponents();
    }
    
    protected function addObjectInApp($obj) {
        SyphRegister::add($obj, end(explode("\\",get_class($obj))));
    }
    
    protected function getObjectInApp($name) {
        return SyphRegister::get($name);
    }
    
    protected function verifyObjectInApp($name) {
        return SyphRegister::exists($name);
    }
    
    protected function createView() {
        $view = new View();
        $this->addObjectInApp($view);
    }
    
    private function initAppComponents() {
        $request = new Request;
        $this->addObjectInApp($request);
        $response = new Response();
        $this->addObjectInApp($response);
        $router = new Router();
        $this->addObjectInApp($router);
        $dbal = new DB;
        $this->addObjectInApp($dbal);
    }
}
