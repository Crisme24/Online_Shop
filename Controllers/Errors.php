<?php

class Errors extends Controllers
{
    public function __construct()
    {
        //Este metodo viene desde el constructor del archivo Controller.php que esta en Libraries
        //Esto es para que me carge automaticamente el model que corresponde
        parent::__construct();
    }

    public function notFound()
    {
        $this->views->getView($this, "error");

    }
}

$notFound = new Errors();
$notFound->notFound();
