<?php
/**
 * Description of Router
 *
 * @author bruno
 */
namespace Syph\Routing;

use Syph\Core\Master\SyphRegister;


class Router {
    
    use \Syph\Util\Inflector;
    use \Syph\Http\RequestHandler;

    private $config;
    public $request;
    private $url;
    public $module;
    private $params;
    private $redirect;


    public function route() {
        $this->cleanUrl();
        $this->setModule();
        return $this->loadModule();
    }
    public function redirect($route) {
        $this->bindModule($route);
        return $this->loadBindModule();
    }
    
    public function __construct() {
        $this->request = SyphRegister::get("request");
    }

    
    
    //-------------------------------START GETTERS----------------------------//
    
    public function getRoute() {
        return $this->module;
    }
    
    public function getController() {
        return $this->module['controller'];
    }
    
    public function getAction() {
        return $this->module['action'];
    }
    
    //-------------------------------END GETTERS------------------------------//
    //-------------------------------Handlers---------------------------------//
    private function cleanUrl($url = true, $params = false) {
        if ($url) {
            if (preg_match('/.{1,}(\/){1}$/', $this->url)) {
                $this->request->setUrl(substr($this->request->getUrl(), 0, -1));
            }
        }
        if ($params) {
            $this->request->setParametros(substr($this->request->getUrl(), 1));
        }
    }

    private function urlArray() {
        if (preg_match('/.{1,}(\/){1}$/', $this->request->getUrl())) {
            $this->request->setUrl(substr($this->request->getUrl(), 0, -1));
        }
    }

    public function bindModule($route) {
        $this->redirect = $route;
        
    }
    
    private function setModule() {
        if (isset($this->config->router[$this->request->getUrl()])) {
            $this->module = $this->config->router[$this->request->getUrl()];
        } else {
            $this->cleanUrl(false, true);
            $this->request->setParametros(explode('/', $this->request->getParametros()));

            $this->request->setParametro(0,$this->upperCamelCase($this->request->getParametro(0)));

            if ($this->request->getUrl() == '/') {
                $this->module = self::getDefaultRoute();
            } else {
                $this->module['controller'] = $this->request->getParametro(0);
                if (isset($this->request->getParametros()[0])) {
                    $this->module['action'] = $this->request->getParametro(1);
                }
            }
            
        }
        $this->getModuleArgs();
        if (!isset($this->module['action']) || empty($this->module['action'])) {
            $this->module['action'] = 'read';
        }
        if (!isset($this->module['controller']) || empty($this->module['controller'])) {
            $this->module['controller'] = 'HelloSyph';
        }
    }
    
    private function loadModule() {
        $this->module['controller'] = "Modules\\".$this->module['controller'] ."\\".$this->module['controller'] . 'Controller';
        $controller = $this->module['controller'];
        $action = $this->module['action'];
        $module = new $controller($this->module);
        
        return $module->$action();
    }
    private function loadBindModule() {
        $this->redirect['controller'] = "Modules\\".$this->redirect['controller'] ."\\".$this->redirect['controller'] . 'Controller';
        $controller = $this->redirect['controller'];
        $action = $this->redirect['action'];
        $module = new $controller($this->module);
        
        return $module->$action();
    }
    
    private function getmoduleArgs() {
        foreach ($this->request->getParametros() as $key => $value) {
            if($key != 0 && $key != 1){
                $this->module['params'][] = $value;
            }
        }
    }
    public static function getDefaultRoute() {
        return array(
                    'model' => 'HelloSyph',
                    'controller' => 'HelloSyph',
                    'action' => 'HelloSyph',
                );
    }
    //-------------------------------End Handlers-----------------------------//
}
