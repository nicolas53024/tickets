<?php

namespace App\Libraries;

use PDO;

class DBConnection {

    protected static $instance;
    /**
     * create singleton instance of PDO 
     * SINGLETON PATTERN
     * autor: Nicolas Aldana
     * @return self
     */
    public static function connect()
    {
        (new DotEnv())->load();
        $driver=getenv('DB_CONNECTION');
        $dbHost=getenv('DB_HOST');
        $dbPort=getenv('DB_PORT');
        $dbName=getenv('DB_DATABASE');
        $user=getenv('DB_USERNAME');
        $password=getenv('DB_PASSWORD');
        if (empty(self::$instance)) {
            self::$instance=new PDO("$driver:host=$dbHost;port=$dbPort;dbname=$dbName",$user,$password,[
                PDO::ATTR_EMULATE_PREPARES=>false,
                PDO::ATTR_ERRMODE     => PDO::ERRMODE_EXCEPTION,
            ]);
        }

        return self::$instance;
    }


}