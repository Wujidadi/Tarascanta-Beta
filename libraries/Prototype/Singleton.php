<?php

namespace Libraries\Prototype;

/**
 * Proto type of a singleton class.
 */
abstract class Singleton
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
    protected function __construct() {}

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
     * Destructor.
     *
     * @return void
     */
    public function __destruct() {}
}
