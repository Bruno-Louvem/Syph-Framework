<?php

/**
 * Description of Syp_Controller_FrontController
 *
 * @author bruno
 * 
 */

namespace Syph\Controller;

use Syph\Core\Master\Core;
use Syph\Core\Request;
use Syph\Core\Router;
use Syph\Core\View;

class FrontController extends Core {

    use \Syph\Util\RequestHandler;

    /**
     * Instancia o Roteador e inicia o roteamento
     */
    public function initApp() {
        return $this->configApp();
    }
    
    public function configApp() {
        $request = new Request;
        $view = new View();
        $this->addObjectInApp($request);
        $this->addObjectInApp($view);
        $this->setRequest($request);
        if($request->getUrl()){
            return true;
        }else{
            return false;
        }
    }

    public function executeApp() {
        $router = new Router();
        $router->route();
    }

}
