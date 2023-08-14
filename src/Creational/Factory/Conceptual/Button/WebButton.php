<?php

namespace Warden\Patterns\Creational\Factory\Conceptual\Button;

class WebButton implements Button
{
    public function render()
    {
        echo "render web btn\n";
    }
}
