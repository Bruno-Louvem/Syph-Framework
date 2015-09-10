<?php

/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/08/2015
 * Time: 12:02
 */
use Syph\Http\Interfaces\HttpInterface;
use Syph\Routing\Router;
use Syph\Autoload\ClassLoader;
use Syph\AppBuilder\Interfaces\BuilderInterface;

class AppKernel
{

    private $http;
    private $app;
    private $loaded = array();
    /**
     * Construtor do Kernel.
     */
    public function __construct(array $env)
    {
        $this->boot($env['packages']);
    }

    public function handleRequest(HttpInterface $http,BuilderInterface $builder)
    {
        $this->http = $http;
        $this->app = $builder->loadApp();
        //$this->boot($this->app['package']);
    }

    public function getResponse()
    {
        $route = Router::execute($this->http->getRequest());

        if(isset($route['args'])){
            return $this->handleController($route['controller'],$route['action'],$route['args']);
        }else{
            return $this->handleController($route['controller'],$route['action']);
        }



    }

    public function handleController($controllerName,$actionName,$args = array())
    {
        $appName = $this->app['app_name'];

        if(file_exists(realpath(dirname(__FILE__)) . DS.$appName.DS.'Controller'.DS.$controllerName.'.php')){
            include_once(realpath(dirname(__FILE__)) .DS.$appName.DS.'Controller'.DS.$controllerName.'.php');

            $controller = '\\'.$appName.'\\'.'Controller'.'\\'.$controllerName;

            if(method_exists($controller,$actionName)) {

                return $this->runController($controller, $actionName, $args);
            }else{
                throw new \Exception(sprintf('Método: %s não encontrado',$actionName),404);
            }

        }else{
            throw new \Exception(sprintf('Controlador: %s não encontrado',$controllerName),404);
        }

    }

    public function getController($controllerName)
    {
        return new $controllerName;
    }

    public function runController($controllerName,$action,$args = array())
    {

        if(is_callable(array($controllerName ,$action)))
        {
//            $controller = $this->getController($controllerName);
            return call_user_func_array(array( new $controllerName ,$action), $args);
        }
        throw new \Exception('Controller não pode ser chamado',404);
    }

    private function boot($env)
    {
        foreach($env as $name => $path) {
            $loader = new ClassLoader($name, $path);
            $loader->register();
            $this->loaded[] = $loader;
        }
    }



}