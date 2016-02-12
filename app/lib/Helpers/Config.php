<?php

namespace Company\Helpers;

class Config {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = parse_ini_file(__DIR__ . "/../../../config.ini", true);
        }
        return self::$instance;
    }
}
