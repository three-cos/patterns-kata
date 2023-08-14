<?php

namespace Warden\Patterns\Creational\Builder\RealWorld;

class MySQLBuilder implements SQLQueryBuilder
{
    private string $select = '';
    private string $order = '';
    private string $limit = '';
    private string $offset = '';
    private array $where = [];

    public function select(string $table, array $fields = ['*']): self 
    {
        $fields = implode(', ', $fields);

        $this->select = "SELECT {$fields} FROM {$table}";

        return $this;
    }
    
    public function where(string $field, string $equation, mixed $value = null): self 
    {
        if (null == $value) {
            $value = $equation;
            $equation = '=';
        }

        $this->where[] = "WHERE {$field} {$equation} {$value}";
 
        return $this;
    }
    
    public function orderBy(string $field, string $direction = 'ASC'): self 
    {
        $this->order = "ORDER BY {$field}, {$direction}";

        return $this;
    }
    
    public function limit(int $limit = 15): self 
    {
        $this->limit = "LIMIT {$limit}";

        return $this;
    }
    
    public function offset(int $offset = 0): self 
    {
        $this->offset = "OFFSET {$offset}";

        return $this;
    }
    
    public function get() 
    {
        $where = implode(' AND ', $this->where);

        $query = "{$this->select} {$where} {$this->order} {$this->limit} {$this->offset}";

        return $query;
    }
}