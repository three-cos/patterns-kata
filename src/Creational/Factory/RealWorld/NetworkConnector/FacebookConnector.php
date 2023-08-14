<?php

namespace Warden\Patterns\Creational\Factory\RealWorld\NetworkConnector;

class FacebookConnector implements NetworkConnector
{
    public function __construct(private $login, private $password)
    {
    }

    public function login()
    {
        echo "login to fb with {$this->login} \n";
    }

    public function post($message)
    {
        echo "Post via facebook: $message \n";
    }

    public function logout()
    {
        echo "logout from fb \n";
    }
}
