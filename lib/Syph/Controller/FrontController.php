<?php
/**
 * Description of Syp_Controller_FrontController
 *
 * @author bruno
 * 
 */
namespace Syph\Controller;

use Syph\Core\Router;
use Syph\Core\View;

class FrontController {
    
    /**
     * Instancia o Roteador e inicia o roteamento
     */
    public function startApp() {
        $router = new Router();
        $view = new View();
        $router->route($view);
    }
}
