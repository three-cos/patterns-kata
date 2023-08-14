<?php

namespace Warden\Patterns\Creational\Factory\RealWorld;

use Warden\Patterns\Creational\Factory\RealWorld\PostSender\FacebookPostSender;
use Warden\Patterns\Creational\Factory\RealWorld\PostSender\TwitterPostSender;

class Example2
{
    public function __invoke()
    {
        $factory = new BookProductFactory;

        var_dump($factory->create('Book', 1200, 'ISBN:1212121'));
    }
}
