<?php


namespace App\Exceptions;


class NotFoundParam extends \Exception
{
    public function __construct()
    {
        parent::__construct("Not param exists in this route");
    }
}