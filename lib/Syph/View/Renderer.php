<?php
/**
 * Created by PhpStorm.
 * User: PSBI
 * Date: 20/08/2015
 * Time: 09:59
 */

namespace Syph\View;


use Syph\View\Interfaces\RendererInterface;

class Renderer implements RendererInterface
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function loadContent($filename,$vars)
    {
        extract($vars);
        include($filename);
    }

    public function render($file,$vars)
    {
        ob_start();
        $this->createFileRender('app/view',$file,$vars);
        return ob_get_clean();
    }

    public function createFileRender($path, $file,$vars)
    {
        $filename = $path .'/'.$file;
        if($this->validatePath($filename)){
            $this->loadContent($filename,$vars);
        }
    }

    public function validatePath($filename)
    {
        return file_exists($filename);
    }

    public function getFilename()
    {
        return $this->file;
    }
}