<?php

namespace Acme;

use PDO;

/**
 * Description of DatabaseAdapter
 *
 * @author hungtran
 */
class DatabaseAdapter {
    protected $connection;
    
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }
    
    
    public function fetchAll($tableName)
    {
        return $this->connection
                ->query('SELECT * FROM ' . $tableName)
                ->fetchAll();
    }
    
    public function query($sql, $params)
    {
        return $this->connection->prepare($sql)->execute($params);
    }
    
    
    
}
