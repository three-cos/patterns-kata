<?php

namespace Warden\Patterns\Creational\Factory\RealWorld;

interface ProductFactory
{
    public function create(): Product;
}

class BookProductFactory implements ProductFactory
{
    public function create(...$arg): Product
    {
        return new BookProduct(...$arg);
    }
}

class ElectoronicProductFactory implements ProductFactory
{
    public function create(...$arg): Product
    {
        return new ElectronicProduct(...$arg);
    }
}

class ClothingProductFactory implements ProductFactory
{
    public function create(...$arg): Product
    {
        return new ClothingProduct(...$arg);
    }
}

abstract class Product
{
    public function __construct(private $name, private $price)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class BookProduct extends Product
{
    public function __construct(private $name, private $price, private $isbn)
    {
    }

    public function getName(): string
    {
        return "{$this->name} ({$this->isbn})";
    }
}

class ElectronicProduct extends Product
{
    public function __construct(private $name, private $price, private $socketType)
    {
    }

    public function getName(): string
    {
        return "{$this->name} ({$this->socketType})";
    }
}

class ClothingProduct extends Product
{
    public function __construct(private $name, private $price, private $size)
    {
    }

    public function getName(): string
    {
        return "{$this->name} ({$this->size})";
    }
}

$factory = new BookProductFactory;
var_dump($factory->create('Book', 1200, 'ISBN:1212121')->getName()); // Book (ISBN:1212121)