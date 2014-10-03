<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileHandler
 *
 * @author bruno
 */
namespace Syph\Model\FileSystem;


class FileHandler {
    
    /**
     * 
     * @param string $dir caminho a ser verificado
     * @return boolean
     */
    public static function isDir($dir){
        if(dir($dir)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function load($path_to_file,$ext = "text") {
        if($ext == "json"){
            $content = json_decode(file_get_contents($path_to_file.".".$ext),true);
        }  else {
            $content = parse_str(file_get_contents($path_to_file.DS."Config".DS."Config.".$ext),true);
        }
        unset($path_to_file,$ext);
        return $content;
    }
    
    
}
