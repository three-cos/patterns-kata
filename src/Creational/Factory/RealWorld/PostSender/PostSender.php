<?php

namespace Warden\Patterns\Creational\Factory\RealWorld\PostSender;

use Warden\Patterns\Creational\Factory\RealWorld\NetworkConnector\NetworkConnector;

abstract class PostSender
{
    public function send($message)
    {
        $connector = $this->getConnector();
        
        $connector->login();
        $connector->post($message);
        $connector->logout();
    }

    public abstract function getConnector(): NetworkConnector;
}
