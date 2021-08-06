<?php

namespace Helpers;

use App\Exceptions\MethodNotAllowedException;

class ErrorHandler
{
    /**
     *
     *
     */
    public function handle($exception)
    {
        $date = date('Y-m-d h:i:s');
        $log = <<<EOD
        [$date] $exception \n
        EOD;
        file_put_contents('../Logs/' . date('Y-m') . '_app_logs.log', $log, FILE_APPEND);

        if (getenv('APP_ENV') === 'dev') {
            http_response_code(Http::INTERNAL_SERVER_ERROR);
            $code=Http::INTERNAL_SERVER_ERROR;
            ob_start();
            include_once realpath("../app/views/errors/trackExceptions.phtml");
            ob_end_flush();
        } else {
            if ($exception instanceof MethodNotAllowedException) {
                http_response_code(Http::METHOD_NOT_ALLOWED);
                echo $exception->getMessage(), $exception->getFile(), $exception->getLine();
            }
        }

    }
}
