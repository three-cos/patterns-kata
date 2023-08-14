<?php

namespace Warden\Patterns\Creational\Factory\RealWorld\NetworkConnector;

class TwitterConnector implements NetworkConnector
{
    public function __construct(private $login, private $password)
    {
    }

    public function login()
    {
        echo "login to twitter with {$this->login} \n";
    }
    public function post($message)
    {
        echo "Post via twitter: $message \n";
    }

    public function logout()
    {
        echo "logout from twitter \n";
    }
}
