<?php

namespace Warden\Patterns\Creational\Prototype\RealWorld;

use DateTime;

class Example
{
    public function __invoke()
    {
        $author = new Author('WardenYarn');
        $post = new Post('a new post', $author);

        $post->setCreatedAt(new DateTime('05.05.2022'));
        $post->addComment('Cool post');
        $post->addComment('Thanks!');

        $clonedPost = clone $post;

        /** 
         * Expected two posts: original and a copy
         */
        foreach ($author->getPosts() as $post) {
            echo sprintf("'%s' by %s at %s (%d comments) \n", ...[
                $post->title, 
                $post->author->name, 
                $post->created(), 
                count($post->comments)
            ]);
        }
    }
}
