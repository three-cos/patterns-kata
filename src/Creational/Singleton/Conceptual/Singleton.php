<?php

namespace Warden\Patterns\Creational\Singleton\Conceptual;

class Singleton
{
    private static ?self $instance = null;

    private function __construct() {}

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}