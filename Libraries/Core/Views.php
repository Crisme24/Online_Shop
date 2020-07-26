<?php

class Views
{
    function getView($controller, $view, $data = "")
    {
        $controller = get_class($controller);//Este es para obtener el nombre de la clase

        if($controller == "Home")
        {
            $view = "Views/".$view.".php";
        } else {
            $view = "Views/".$controller."/".$view.".php";
        }

        require_once ($view);
    }
}
