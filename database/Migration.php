<?php

namespace Database;

use PDOException;
use Libraries\DBAPI;
use Libraries\Logger;

abstract class Migration
{
    protected $_db = null;

    abstract public static function getInstance();

    /**
     * Constructor.
     *
     * @param  string  $dbConfigKey  Key of the database configurations in `DB_CONFIG` array which shall be use.
     */
    protected function __construct($dbConfigKey = 'DEFAULT')
    {
        $this->_db = DBAPI::getInstance($dbConfigKey);
    }

    /**
     * Run migration commands.
     *
     * @param  string    $className     Name of the migration class in which the _run method is called
     * @param  string    $functionName  Name of the migration function in which the _run method is called
     * @param  string[]  $queryArray    Array of SQL commands
     * @return boolean
     */
    protected function _run($className, $functionName, $queryArray)
    {
        try
        {
            $this->_db->beginTransaction();

            foreach ($queryArray as $sql)
            {
                $this->_db->query($sql);
            }
        }
        catch (PDOException $ex)
        {
            $this->_db->rollBack();

            $exCode = $ex->getCode();
            $exMsg  = $ex->getMessage();
            Logger::getInstance()->logError("{$className}::{$functionName} PDOException: ({$exCode}) {$exMsg}");

            return false;
        }

        $commitResult = $this->_db->commit();

        return $commitResult;
    }
}
