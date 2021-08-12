<?php


namespace App\Libraries;


use App\Exceptions\NotFoundParam;

class Request
{
    public function __construct(
        public $request
    )
    {

    }

    /**
     *  validate if input value exists in request
     * @param string $param
     * @return bool
     */
    public function inputExists(string $param): bool
    {
        return array_key_exists($param, $this->request);
    }

    /**
     *  gets input value
     * @param string $param
     * @return mixed
     * @throws NotFoundParam
     */
    public function getInput(string $param): mixed
    {
        if (!array_key_exists($param, $this->request)) throw new NotFoundParam();
        return $this->request[$param];
    }

    /**
     *  gets cookie value
     * @param string $cookie
     * @return mixed
     */
    public function getCookie(string $cookie): mixed
    {
        return $_COOKIE[$cookie]??false;
    }
}