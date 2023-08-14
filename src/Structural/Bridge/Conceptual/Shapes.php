<?php

namespace Warden\Patterns\Structural\Bridge\Conceptual;

interface Shape
{
    public function getName(): string;

    public function getCoordinates(): void;
}

class Square implements Shape
{
    public function getName(): string
    {
        return 'Square';
    }

    public function getCoordinates(): void
    {
    }
}

class Circle implements Shape
{
    public function getName(): string
    {
        return 'Circle';
    }

    public function getCoordinates(): void
    {
    }
}

abstract class Renderer
{
    public function __construct(protected Shape $shape)
    {
    }
 
    abstract public function render(): void;
}

class RasterRenderer extends Renderer
{
    public function render(): void
    {
        var_dump("Render {$this->shape->getName()} in raster");
    }
}

class VectorRenderer extends Renderer
{
    public function render(): void
    {
        var_dump("Render {$this->shape->getName()} in vector");
    }
}

$square = new Square;
$circle = new Circle;

$rasterRenderer = new RasterRenderer($square);
$rasterRenderer->render();

$vectorRenderer = new VectorRenderer($circle);
$vectorRenderer->render();