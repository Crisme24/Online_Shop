<?php

class Controllers
{
    public function __construct()
    {
        $this->views = new Views();
        //Para que este metodo se ejecute debo invocarlo desde los archivos que estan en la carpeta Controllers
        $this->loadModel();
    }

    //Para que el metodo loadModel se ejecute debo invocarlo desde el constructor
    public function loadModel()
    {
        //HomeModel.php
        $model = get_class($this)."Model";
        $routClass = "Models/".$model.".php";
        if (file_exists($routClass)){
            require_once($routClass);
            $this->model = new $model();
        }
    }
}
