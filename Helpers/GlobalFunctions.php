<?php

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
