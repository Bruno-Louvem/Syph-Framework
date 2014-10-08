<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardController
 *
 * @author bruno
 */
namespace Modules\HelloSyph;

/*
 * Imports das classes
 */
use Syph\Core\Master\Core;
use Syph\Controller\ApplicationController;
use Syph\Core\View;
//use Models\Entities\User;

class HelloSyphController extends ApplicationController{
    
    public function __construct($args) {
        parent::__construct();
        $this->args = $args;
        $this->SyphLoaderConfig(dirname(__FILE__).DS."Config".DS,"Config");
    }
    
    public function HelloSyph() {
        if($this->_config){
            
            return $this->SyphCreateView();
        }
    }
    
    public function GenerateModule() {
        if($this->_config){
            $ORM = Core::getObjectInApp('db')->getEntityManager();
            $user = $ORM->find('User',1);
            View::setVars('coprigth',$user->getNome());
            return $this->SyphCreateView();
        }
    }
    public function CreateModule() {
        if($this->_config){
//            $ORM = Core::getObjectInApp('db')->getEntityManager();
//            $user = new \User();
//            $user->setNome($nome = Core::getObjectInApp('request')->getPost('nome'));
//            $ORM->persist($user);
//            $ORM->flush();
            Core::getObjectInApp('router')->redirect(array('controller'=>'Usuarios','action'=>'Read'));
            View::setVars('modulo','Renata');
            return $this->SyphCreateView();
        }
    }
}
