<?php

namespace Company\Helpers;

class Connection {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
            $config = Config::getInstance();
            self::$instance = new \PDO($config['db']['dsn'],
                $config['db']['user'],
                $config['db']['password'],
                $pdo_options
            );
        }
        return self::$instance;
    }
}
