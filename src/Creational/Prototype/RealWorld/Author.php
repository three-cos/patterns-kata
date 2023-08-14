<?php

namespace Warden\Patterns\Creational\Prototype\RealWorld;

class Author
{
    private array $posts = [];

    public function __construct(public $name)
    {
    }

    public function addPost(Post $post): void
    {
        $this->posts[] = $post;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }
}
