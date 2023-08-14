<?php

namespace Warden\Patterns\Creational\Builder\RealWorld;

interface SQLQueryBuilder 
{
    public function select(string $table, array $fields = ['*']): self;
    public function where(string $field, string $equation, mixed $value = null): self;
    public function orderBy(string $field, string $direction = 'ASC'): self;
    public function limit(int $limit = 15): self;
    public function offset(int $offset = 0): self;
    public function get();
}