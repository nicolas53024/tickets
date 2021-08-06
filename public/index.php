<?php
declare(strict_types=1);



use App\Libraries\DotEnv;
use App\Libraries\RouterResolver;

require __DIR__ . '/../vendor/autoload.php';

// load environment values for build app
(new DotEnv())->load();
// replace uri params
$uri = $_GET["url"] ?? "/";

//set handler exceptions for all application
$handler=new \Helpers\ErrorHandler();
set_exception_handler([$handler, 'handle']);

//include routes for app
$routes = include '../app/Routes/Routes.php';
$method = strtolower($_SERVER['REQUEST_METHOD']);

//resolve the uri and dispatch method of controller, if not exists throw exception
if (isset($routes[$uri])) {
    if($method !== $routes[$uri]['method']){
        throw new App\Exceptions\MethodNotAllowedException('Method Not Allowed for this route');
    }
    RouterResolver::{$method}($routes[$uri]['controller'],$routes[$uri]['action'],$_REQUEST);
}
else{
     throw new App\Exceptions\NotFoundHttpException("for this route /$uri ");
}
