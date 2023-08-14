<?php

namespace Warden\Patterns\Creational\Factory\Conceptual\Dialog;

use Warden\Patterns\Creational\Factory\Conceptual\Button\Button;
use Warden\Patterns\Creational\Factory\Conceptual\Button\WebButton;

class WebDialog extends Dialog
{
    public function createBtn(): Button
    {
        return new WebButton();
    }
}
