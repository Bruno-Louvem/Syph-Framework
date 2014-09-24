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
use Syph\Model\FileSystem\FileHandler;
use Syph\Core\Response;


class ApplicationController {
    protected $_config;
    
    /**
     * Faz a leitura do arquivo de configuração do Módulo.
     * @param string $path Nome do Módulo no caminho de configuração.
     * @param string $ext = <b>"json"</b> extensão do arquivo de configuração, (Padrão json).
     */
    protected function SyphLoaderConfig($path,$ext = "json") {
        if(FileHandler::isDir($path.DS."Config")){
            $this->_config = FileHandler::load($path, $ext);
        }
    }
    /**
     * Gera uma view com as configurações padrões.
     */
    protected function SyphCreateView() {
        Response::View($this->_config);
    }
}
