<?php

namespace Warden\Patterns\Creational\AbstractFactory\Conceptual\Products;

interface AbstractProductB
{
    public function name(): string;

    public function useWith(AbstractProductA $productA): string;
}