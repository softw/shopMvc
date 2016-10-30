<?php

require('config.php');

spl_autoload_register(function($class){
    $classRoute = LIBS.$class.".php";
    if(file_exists($classRoute)){
        require $classRoute;
    }elseif(MODELS.$class.".php"){
        require MODELS.$class.".php";
    }else{
        if(file_exists(BS.$class.".php")){
            require BS.$class.".php";
        }else{
            exit("la clase: $class no ha sido definida");
        }
    }
});

$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
$url = explode('/',$url);
//print_r($url);

$controllerName = (isset($url[0])) ? $url[0]."Controller" : 'homeController';
$methodName = (isset($url[1]) && $url[1] != null ) ? $url[1] : 'index';
$parametersName = (isset($url[2]) && $url[2] != null) ? $url[2] : null;

//test

echo "controlador: " . $controllerName;
echo "</br>metodo: " . $methodName;
echo "</br>parametros: " . $parametersName."</br>";


$path = "./controllers/".$controllerName.".php";
if(file_exists($path)){
    require $path;
    $controller = new $controllerName();
        if(method_exists($controller, $methodName)){
            if($parametersName != null){
                $controller->{$methodName}($parametersName);
            }else{
                $controller->{$methodName}();
            }
        }else{
            exit ("invalid method");
        }
}else{
    //pagina no encontrada
    //TODO: LANZAR ERROR 404
    exit("invalid controller");
}