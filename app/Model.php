<?php

namespace App;

use Libraries\DBAPI;

/**
 * Parent class of model.
 */
abstract class Model
{
    protected $_db = null;

    abstract public static function getInstance();

    protected function __construct()
    {
        $this->_db = DBAPI::getInstance();
    }

    public function beginTransaction()
    {
        return !$this->_db->inTransaction() ? $this->_db->beginTransaction() : false;
    }

    public function commit()
    {
        return $this->_db->commit();
    }

    public function rollBack()
    {
        return $this->_db->rollBack();
    }

    public function inTransaction()
    {
        return $this->_db->inTransaction();
    }
}
