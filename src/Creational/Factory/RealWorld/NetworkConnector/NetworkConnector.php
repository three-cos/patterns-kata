<?php

namespace Warden\Patterns\Creational\Factory\RealWorld\NetworkConnector;

interface NetworkConnector
{
    public function login();
    public function post($message);
    public function logout();
}
