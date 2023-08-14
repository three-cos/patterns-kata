<?php

namespace Warden\Patterns\Creational\Factory\Conceptual;

use Warden\Patterns\Creational\Factory\Conceptual\Dialog\WebDialog;
use Warden\Patterns\Creational\Factory\Conceptual\Dialog\WindowDialog;

class Example
{
    public function __invoke()
    {
        $winDialog = new WindowDialog();
        $winDialog->render();
        $winDialog->createBtn()->render();

        $webDialog = new WebDialog();
        $webDialog->render();
        $webDialog->createBtn()->render();
    }
}
