<?php

namespace Warden\Patterns\Creational\Factory\Conceptual\Dialog;

use Warden\Patterns\Creational\Factory\Conceptual\Button\Button;

abstract class Dialog
{
    public function render()
    {
        echo "show dialog\n";
    }

    abstract public function createBtn(): Button;
}
