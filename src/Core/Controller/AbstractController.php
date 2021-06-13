<?php 

namespace App\Core\Controller;

abstract class AbstractController 
{
    
    protected function render($view, $params) 
    {
        extract($params);
        include $view;
    }
}