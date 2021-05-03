<?php

namespace App\Controllers;

use Libraries\Prototype\Singleton;

/**
 * Proto type of a controller class.
 */
abstract class Controller extends Singleton
{
    /**
     * Instance of this class.
     *
     * @var self|null
     */
    protected static $_instance = null;

    /**
     * Constructor.
     *
     * @return void
     */
    protected function __construct()
    {
        $this->_init();
    }

    /**
     * Object cloning method.
     *
     * @return void
     */
    protected function __clone() {}

    /**
     * Get the instance of this class.
     * 
     * @return self
     */
    abstract public static function getInstance();

    /**
     * Initialization method.
     *
     * @return void
     */
    protected function _init() {}

    /**
     * Destructor.
     *
     * @return void
     */
    public function __destruct() {}
}
