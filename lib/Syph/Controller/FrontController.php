<?php

/**
 * Description of Syp_Controller_FrontController
 *
 * @author bruno
 * 
 */

namespace Syph\Controller;

use Syph\Core\Master\Core;


class FrontController extends Core {

    use \Syph\Util\RequestHandler;

    /**
     * Instancia o Core com o contruct do FrontController
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Inicializa a Aplicação chamando a resposta do método config
     */
    public function initApp() {
        return $this->configApp();
    }
    
    /**
     * Inicializa o Request e o configura 
     * retornando true caso tenha configurado
     * com sucessor
     * @return boolean
     */
    public function configApp() {
        $this->setRequest($this->getObjectInApp('request'));
        if($this->getObjectInApp('request')->getUrl()){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Executa a aplicação retornando o controller roteado para o <b>Response</b>;
     */
    public function executeApp() {
        $this->getObjectInApp('response')->responseApp($this->getObjectInApp('router')->route());
    }
    
    /**
     * Metodo que expoe o metodo getObjectInApp
     * @param string $name Nome do objeto a ser buscado no SyphRegister
     * @return Object Objeto selecionado
     */
    public function getComponent($name) {
        return $this->getObjectInApp($name);
    }

}
