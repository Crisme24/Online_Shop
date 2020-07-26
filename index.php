<?php

require_once("Config/Config.php");
require_once("Helpers/Helpers.php");

//Aqui es 'url' porque asi lo llame en el archivo .htaccess en RewriteRule
//Y es para ver todo lo que venga despues de la raiz osea lo que venga despues del nombre del proyecto
$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';

//Convierto la ruta en un array
$arrUrl = explode("/", $url);

//Aqui asigno valores por default
$controller = $arrUrl[0];
$method = $arrUrl[0];
$params = "";

//Asignar valor al metodo o funcion
if (!empty($arrUrl[1]))
{
    if ($arrUrl[1] != "")
    {
        $method = $arrUrl[1];
    }
}
//Detectar los parametros en la url
if (!empty($arrUrl[2]))
{
    if ($arrUrl[2] != "")
    {
        //$i < count($arrUrl) esto quiere decir que si el array es mayor a 2 los vaya separando con coma
        for ($i=2; $i < count($arrUrl); $i++) {
            $params .= $arrUrl[$i]. ',';
        }
        $params = trim($params, ',');
    }
}

//Autoload es para cargar las clases
require_once("Libraries/Core/Autoload.php");

//Load
//Comienza la comunicacion con los controladores
require_once("Libraries/Core/Load.php");
//Fin de la comunicacion con los controladores

// echo "<br>";
// echo "controlador: ".$controller ."<br>";
// echo "método: ".$method ."<br>";
// echo "parametros: ".$params;
