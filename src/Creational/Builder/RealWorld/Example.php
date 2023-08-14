<?php

namespace Warden\Patterns\Creational\Builder\RealWorld;

class Example 
{
    public function __invoke()
    {
        $sql = new MySQLBuilder();

        echo $sql->select('users', ['id', 'name'])
            ->where('created_at', '>', time())
            ->where('is_admin', true)
            ->limit(10)
            ->offset(5)
            ->orderBy('id', 'desc')
            ->get();
    }
}