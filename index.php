<?php

use Warden\Patterns\Creational\Factory\RealWorld\Example2;
use Warden\Patterns\Creational\Singleton\RealWorld\Example;

require_once './vendor/autoload.php';

class ExampleRunner
{
    public function start($exampleClass, ...$args)
    {
        (new $exampleClass())(...$args);
    }
}

$runner = new ExampleRunner();
$runner->start(Example2::class);
