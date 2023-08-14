<?php

namespace Warden\Patterns\Creational\Factory\RealWorld;

use Warden\Patterns\Creational\Factory\RealWorld\PostSender\FacebookPostSender;
use Warden\Patterns\Creational\Factory\RealWorld\PostSender\TwitterPostSender;

class Example
{
    public function __invoke()
    {
        $fb = new FacebookPostSender();

        $fb->send('hello!');
    
        
        $tw = new TwitterPostSender();

        $tw->send('twit!');
    }
}
