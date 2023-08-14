<?php

namespace Warden\Patterns\Creational\Factory\RealWorld\PostSender;

use Warden\Patterns\Creational\Factory\RealWorld\NetworkConnector\FacebookConnector;
use Warden\Patterns\Creational\Factory\RealWorld\NetworkConnector\NetworkConnector;

class FacebookPostSender extends PostSender
{
    public function getConnector(): NetworkConnector {
        return new FacebookConnector('warden', '****');
    }
}
