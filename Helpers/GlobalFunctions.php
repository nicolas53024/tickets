<?php

use App\Libraries\DotEnv;

function view(string $view, array $vars = [])
{
    extract($vars);
    $path = realpath("../app/views/pages/$view.phtml");
    if (!file_exists($path)) {
        throw new \InvalidArgumentException(sprintf('%s view does not exist', $view));
    }
    include_once $path;

}
function includeView(string $view, string $title = null)
{

    $path = realpath("../app/views/layouts/$view.phtml");
    if (!file_exists($path)) {
        throw new \InvalidArgumentException(sprintf('%s view does not exist', $view));
    }
    include_once $path;
}

function redirect(string $url = '/')
{
    header("Location: $url");
}
function putFlashMessage($message)
{
    $_SESSION['flashMessage'] = $message;
}

function getFlashMessage()
{
    $message = $_SESSION['flashMessage']??'';
    unset($_SESSION['flashMessage']);
    return $message;
}

function sessionPut(string $key, $value)
{
    $_SESSION[$key] = $value;
}

function sessionGet(string $key)
{
    return $_SESSION[$key]??false;
}

function getAuth()
{
    if(!isset($_SESSION['auth'])) return false;
    
    return (object)$_SESSION['auth'];
}
