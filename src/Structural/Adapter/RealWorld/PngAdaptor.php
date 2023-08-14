<?php

namespace Warden\Patterns\Structural\Adapter\RealWorld;

use Exception;

interface PngImageProcessor
{
    public function open(string $file): void;
    
    public function write(string $file): void;

    public function rotate(int $degrees): void;

    public function invert(): void;
}

class LegacyBmpImageProcessor
{
    public function read_bmp($bmp_file)
    {
        var_dump("read .bmp from $bmp_file");
    }

    public function save_to_file($file_path)
    {
        var_dump("write .bmp to $file_path");
    }

    public function mirror_the_image()
    {
        var_dump("mirror .bmp image");
    }
}

class Png implements PngImageProcessor
{
    public function open(string $file): void
    {
        var_dump("read .png from $file");
    }
    
    public function write(string $file): void
    {
        var_dump("write .png to $file");
    }

    public function rotate(int $degrees): void
    {
        var_dump("rotate .png image for {$degrees} degrees");
    }
    
    public function invert(): void
    {
        var_dump("mirror .png image");
    }
}

class BmpImageAdapter implements PngImageProcessor
{
    public function __construct(protected LegacyBmpImageProcessor $bmp)
    {
    }

    public function open(string $file): void
    {
        $this->bmp->read_bmp($file);
    }
    
    public function write(string $file): void
    {
        $this->bmp->save_to_file($file);
    }

    public function rotate(int $degrees): void
    {
        throw new Exception("Cannot rotate .bmp images");
    }
    
    public function invert(): void
    {
        $this->bmp->mirror_the_image();
    }
}

$legacyBmp = new LegacyBmpImageProcessor();
$legacyBmp->read_bmp('test.bmp');
$legacyBmp->mirror_the_image();
$legacyBmp->save_to_file('test_mirrored.bmp');

$modernBmp = new BmpImageAdapter(new LegacyBmpImageProcessor);
$modernBmp->open('test.bmp');
$modernBmp->invert();
$modernBmp->write('test_mirrored.bmp');