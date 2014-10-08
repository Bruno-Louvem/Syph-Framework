<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author bruno
 */

namespace Syph\Http;

trait RequestHandler {

    /**
     * Retorna todos os dados das requisições 
     * 
     * @return  Array, retorna um vetor com os dados da requisição atual 
     * 
     */
    public function setRequest(\Syph\Http\Request $request) {
        $request->setPost($this->post());
        $request->setGet($this->get());
        $request->setParametros($this->params());
        $request->setPath_info($this->path_info());
        $request->setUrl($this->url());
        $request->setBase_url($this->base_url());
    }

    /**
     * Checa ou retorna o tipo de requisição 
     * 
     * @param string $var o tipo da requisição 
     * 
     * @return  True/false, se $var for enviado como false no parametro $var retorna o metodo usado 
     * 
     */
    public function requestIs($var) {
        $request = $_SERVER['REQUEST_METHOD'];
        $request = strtolower($request);
        if ($var) {
            if ($request == $var) {
                return 'true';
            }
            return 'false';
        }
        return $request;
    }

    /**
     * Retorna os dados enviados via post 
     * 
     * @return  Retorna os dados post 
     * 
     */
    private function post() {
        return $_POST;
    }

    /**
     * Retorna os dados enviados via get 
     * 
     * @return  Retorna os dados get 
     * 
     */
    private function get() {
        return $_GET;
    }

    /**
     * Retorna a path_info (usada para definir o MVC a se usar) 
     * 
     * @return  Retorna a path_info 
     * 
     */
    private function path_info() {
        if (isset($_SERVER["PATH_INFO"])) {
            return $_SERVER["PATH_INFO"];
        }
    }

    /**
     * Retorna os parâmetros enviados (através do path_info) 
     * 
     * @return  Retorna os parametros enviados 
     * 
     */
    private function params() {
        $params = explode('/', $this->path_info());
        unset($params[0]);
        unset($params[1]);
        unset($params[2]);
        $params = array_values($params);
        return $params;
    }

    /**
     * Transforma a pathinfo em url e retorna 
     * 
     * @return  url 
     * 
     */
    private function url() {
        if (empty($this->path_info())) {
            return '/';
        } else {
            return $this->path_info();
        }
    }

    /**
     * Retorna a url base do framework (aonde ele está instalado) 
     * 
     * @return  url base do framework 
     * 
     */
    private function base_url() {
        return $_SERVER['REQUEST_URI'];
    }

}
