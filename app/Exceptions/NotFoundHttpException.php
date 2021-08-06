<?php

namespace App\Exceptions;

class NotFoundHttpException extends \Exception

{

    public function __construct(string $param=null)
    {
        parent::__construct("Not resource found $param");
    }
}
