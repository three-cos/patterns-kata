<?php

namespace Warden\Patterns\Creational\Factory\Conceptual\Button;

class WindowsButton implements Button
{
    public function render()
    {
        echo "render windows btn\n";
    }
}
