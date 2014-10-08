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
use Syph\Http\Request;
use Syph\Http\Response;
use Syph\Routing\Router;
use Syph\Core\View;
use Syph\Model\DB\DB;
class Core {
    
    protected $_config;
    
    protected static $_instance;

    private function __construct() {
        $this->initAppComponents();
    }
    
    public static function getCore() {
      if (!self::$_instance) {
        self::$_instance = new Core();
      }
      return self::$_instance;
    }
    
    public static function addObjectInApp($obj) {
        SyphRegister::add($obj, end($arr_obj = explode("\\",get_class($obj))));
    }
    
    public static function getObjectInApp($name) {
        return SyphRegister::get($name);
    }
    
    public static function verifyObjectInApp($name) {
        return SyphRegister::exists($name);
    }
    
    public static function createView() {
        $view = new View();
        self::addObjectInApp($view);
    }
    
    public function initAppComponents() {
        $request = new Request;
        self::addObjectInApp($request);
        $response = new Response();
        self::addObjectInApp($response);
        $router = new Router();
        self::addObjectInApp($router);
        $dbal = new DB;
        self::addObjectInApp($dbal);
    }
}
