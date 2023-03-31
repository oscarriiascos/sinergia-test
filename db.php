<?php

class Database
{
    //$instance contindrá la únican instancia permitida.
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $credentials = [
            'host' => 'localhost',
            'db'   => 'sinergia_db',
            'user' => 'root',
            'pass' => ''
        ];

        $db_path = "mysql:host=$credentials[host];dbname=$credentials[db];";

        try {
            $this->connection = new PDO(
                $db_path,
                $credentials['user'],
                $credentials['pass']
            );
        } catch (PDOException $exception) {
            throw new PDOException(
                $exception->getMessage(),
                (int)$exception->getCode()
            );
        }
    }

    public static function initialize()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function connect()
    {
        return $this->connection;
    }
}
