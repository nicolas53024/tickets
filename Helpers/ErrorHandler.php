<?php


namespace Helpers;


use App\Exceptions\MethodNotAllowedException;


class ErrorHandler
{
    /**
     *
     *
     */
    public function handle($e)
    {
        $date = date('Y-m-d h:i:s');
        $log = <<<EOD
        [$date] $e \n
        EOD;
        file_put_contents('../Logs/' . date('Y-m') . '_app_logs.log', $log, FILE_APPEND);
        if($e instanceof MethodNotAllowedException){
            echo 'test de ', $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine();
        }

    }
}