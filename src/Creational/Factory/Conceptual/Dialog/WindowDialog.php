<?php

namespace Warden\Patterns\Creational\Factory\Conceptual\Dialog;

use Warden\Patterns\Creational\Factory\Conceptual\Button\Button;
use Warden\Patterns\Creational\Factory\Conceptual\Button\WindowsButton;

class WindowDialog extends Dialog
{
    public function createBtn(): Button
    {
        return new WindowsButton();
    }
}
