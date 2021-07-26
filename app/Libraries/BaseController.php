<?php


namespace App\Libraries;


class BaseController
{
    protected function jsonResponse($response,int $responseCode = 200)
    {
        header('Content-Type: application/json', false, $responseCode);
        echo json_encode($response);
    }
}