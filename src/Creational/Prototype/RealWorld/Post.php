<?php

namespace Warden\Patterns\Creational\Prototype\RealWorld;

use DateTime;

class Post
{
    public array $comments = [];
    public DateTime $created_at;

    public function __construct(public string $title, public Author $author)
    {
        $author->addPost($this);
    }

    public function setCreatedAt(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    public function addComment(string $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    public function created()
    {
        return $this->created_at->format('H:i:s d.m.Y');
    }

    public function __clone()
    {
        $this->title = 'Copy: '.$this->title;

        $this->created_at = new DateTime('now');

        $this->comments = [];

        $this->author->addPost($this);

        return $this;
    }
}
