<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Syph\Http;

/**
 * Description of Request
 *
 * @author bruno
 */
class Request {

    private $post;
    private $get;
    private $parametros;
    private $path_info;
    private $url;
    private $base_url;
    
    function getPost($key = null) {
        if(!is_null($key)){
            return $this->post[$key];
        }else{
            return $this->post;
        }
    }

    function getGet() {
        return $this->get;
    }

    function getParametro($key) {
        return $this->parametros[$key];
    }
    function getParametros() {
        return $this->parametros;
    }

    function getPath_info() {
        return $this->path_info;
    }

    function getUrl() {
        return $this->url;
    }

    function getBase_url() {
        return $this->base_url;
    }

    function setPost($post) {
        $this->post = $post;
    }

    function setGet($get) {
        $this->get = $get;
    }

    function setParametros($parametros) {
        $this->parametros = $parametros;
    }
    function setParametro($key,$parametros) {
        $this->parametros[$key] = $parametros;
    }

    function setPath_info($path_info) {
        $this->path_info = $path_info;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setBase_url($base_url) {
        $this->base_url = $base_url;
    }



}
