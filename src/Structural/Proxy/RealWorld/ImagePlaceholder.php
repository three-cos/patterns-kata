<?php

namespace Warden\Patterns\Structural\Proxy\RealWorld;

interface Displayable
{
    public function display(): string;
}

class Image implements Displayable
{
    public function __construct(protected string $path)
    {
    }

    public function display(): string
    {
        sleep(1);

        return file_get_contents($this->path); // will take a lot of time
    }
}

class ImageCacheProxy implements Displayable
{
    private ?string $cachedImageContent = null;
    
    public function __construct(protected Image $image)
    {
    }

    public function display(): string
    {
        if ($this->cachedImageContent === null) {
            $this->cachedImageContent = $this->image->display();
        }

        return $this->cachedImageContent;
    }
}

$image = new Image('https://via.placeholder.com/1800');

var_dump('showing plain image');
$image->display(); // will take a couple of seconds

$lazyImage = new ImageCacheProxy(new Image('https://via.placeholder.com/1800'));

var_dump('caching image');
$lazyImage->display();

var_dump('showing proxied image');
$lazyImage->display();

var_dump('showing proxied image');
$lazyImage->display();