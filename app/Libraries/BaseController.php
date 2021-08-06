<?php


namespace App\Libraries;

use Helpers\Http;

class BaseController
{
    protected function jsonResponse($response,int $responseCode = Http::OK)
    {
        header('Content-Type: application/json', false, $responseCode);
        echo json_encode($response);
    }
}