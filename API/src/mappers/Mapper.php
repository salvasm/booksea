<?php

namespace booksea\mappers;

use booksea\utils\PDOConnection;

class Mapper {
    protected $db;

    public function __construct($db = null)
    {
        is_null($db) && $db = PDOConnection::getConnection();
        $this->db = $db;
    }

    public function getDBConnection()
    {
        return $this->db;
    }
}