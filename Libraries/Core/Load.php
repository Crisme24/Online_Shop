<?php

$controller = ucfirst($controller);
$controllerFile = "Controllers/".$controller.".php";
    if(file_exists($controllerFile))
    {
        require_once($controllerFile);

        //Aqui cuando instanciamos NO estamos colocando directamente el nombre de la clase porque las clases las estamos
        //cargando automanticamente y la estamos guardando dentro de la variable $controller.
        $controller = new $controller();

        //Aqui estamos validando si existe el metodo en este controlador
        if (method_exists($controller, $method))
        {
            //$controller; aqui esta el nombre de la clase -> {$method} aqui el nombre del metodo
            //Aqui ($params) parametros IF exists y si no tiene parametros no pasa nada porque la iniciamos como string vacio
            $controller->{$method}($params);
        }else {
            require_once("Controllers/Errors.php");
        }
    }else {
        require_once("Controllers/Errors.php");
    }
