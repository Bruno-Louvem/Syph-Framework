<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationController
 *
 * @author bruno
 */
namespace Syph\Controller;
use Syph\Core\Master\Core;
use Syph\Model\FileSystem\FileHandler;
//use Syph\Core\Response;


class ApplicationController{
    
    protected $_config;
    protected $_view;
    protected $_response;
    
    public function __construct() {
        if(FileHandler::isDir($path = realpath(dirname(__FILE__)).'/../../../app/Config')){
            $this->_configApp = include_once($path.'/application.php');
        }
    }
    /**
     * Faz a leitura do arquivo de configuração do Módulo.
     * @param string $path Nome do Módulo no caminho de configuração.
     * @param string $ext = <b>"json"</b> extensão do arquivo de configuração, (Padrão json).
     */
    protected function SyphLoaderConfig($path,$file,$ext = "json") {
        if(FileHandler::isDir($path)){
            $this->_config = FileHandler::load($path.$file,$ext);
        }
    }
    /**
     * Gera uma view com as configurações padrões.
     */
    protected function SyphCreateView() {
        /**
         * Verifica se a view ja foi criada caso não o core a instancia
         */
        if(!Core::verifyObjectInApp('view')){
            Core::createView();
            Core::getObjectInApp('view')->setConf($this->_config);
        }
        return Core::getObjectInApp('view');
    }
}
