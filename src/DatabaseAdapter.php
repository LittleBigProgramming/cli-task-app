<?php

namespace Acme;

use PDO;

class DatabaseAdapter
{
    protected $connection;

    /**
     * DatabaseAdapter constructor.
     * @param PDO $connection
     */
    function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $tableName
     * @return array
     */
    public function fetchAll($tableName)
    {
        return $this->connection->query('select * from ' . $tableName)->fetchAll();
    }

    /**
     * @param $sql
     * @param $parameters
     * @return bool
     */
    public function query($sql, $parameters)
    {
        return $this->connection->prepare($sql)->execute($parameters);
    }
}