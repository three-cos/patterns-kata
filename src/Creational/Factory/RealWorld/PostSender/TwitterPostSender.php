<?php

namespace Warden\Patterns\Creational\Factory\RealWorld\PostSender;

use Warden\Patterns\Creational\Factory\RealWorld\NetworkConnector\TwitterConnector;
use Warden\Patterns\Creational\Factory\RealWorld\NetworkConnector\NetworkConnector;

class TwitterPostSender extends PostSender
{
    public function getConnector(): NetworkConnector {
        return new TwitterConnector('@warden', '****');
    }
}
