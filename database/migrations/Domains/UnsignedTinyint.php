<?php

namespace Database\Migrations\Domains;

use PDOException;
use Libraries\DBAPI;
use Libraries\Logger;
use Database\Migration;

/**
 * Migration class of the domain `unsigned_tinyint`.
 */
class UnsignedTinyint extends Migration
{
    /**
     * Name of the target domain.
     *
     * @var string
     */
    protected $_domainName = 'unsigned_tinyint';

    protected $_className;

    protected static $_uniqueInstance = null;

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (self::$_uniqueInstance == null) self::$_uniqueInstance = new self();
        return self::$_uniqueInstance;
    }

    protected function __construct()
    {
        parent::__construct();
        $this->_className = basename(__FILE__, '.php');
    }

    /**
     * Create the domain.
     *
     * @return boolean
     */
    public function up()
    {
        $sqlArray = [

            <<<EOT
            CREATE DOMAIN public."{$this->_domainName}"
                AS int2
                CHECK (
                    VALUE >= 0 AND VALUE < 256
                );
            EOT

        ];

        if ($runResult = $this->_run($this->_className, __FUNCTION__, $sqlArray))
        {
            Logger::getInstance()->logInfo("Domain \"{$this->_domainName}\" created");
        }

        return $runResult;
    }

    /**
     * Drop the domain.
     *
     * @return boolean
     */
    public function down()
    {
        $sqlArray = [

            "DROP DOMAIN IF EXISTS public.\"{$this->_domainName}\""

        ];

        if ($runResult = $this->_run($this->_className, __FUNCTION__, $sqlArray))
        {
            Logger::getInstance()->logInfo("Domain \"{$this->_domainName}\" dropped");
        }

        return $runResult;
    }
}
