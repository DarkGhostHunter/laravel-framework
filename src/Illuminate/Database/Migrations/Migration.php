<?php

namespace Illuminate\Database\Migrations;

use Closure;

abstract class Migration
{
    /**
     * The name of the database connection to use.
     *
     * @var string|null
     */
    protected $connection;

    /**
     * Enables, if supported, wrapping the migration within a transaction.
     *
     * @var bool
     */
    public $withinTransaction = true;

    /**
     * Callbacks to run after the migration runs "up".
     */
    public $afterUpCallbacks = [];

    /**
     * Callbacks to run during the migration runs "down".
     */
    public $beforeDownCallbacks = [];

    /**
     * Sets the migration without any callback.
     *
     * @var true
     */
    public $runCallbacks = true;

    /**
     * Get the migration connection name.
     *
     * @return string|null
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Registers a Closure to run before running the "up" method.
     *
     * @param  \Closure(\Illuminate\Database\Migrations\Migration):$this  $callback
     * @return $this
     */
    public function afterUp(Closure $callback)
    {
        $this->afterUpCallbacks[] = $callback;

        return $this;
    }

    /**
     * Registers a Closure to run before running the "up" method.
     *
     * @param  \Closure(\Illuminate\Database\Migrations\Migration):$this  $callback
     * @return $this
     */
    public function beforeDown(Closure $callback)
    {
        $this->beforeDownCallbacks[] = $callback;

        return $this;
    }

    /**
     * Disables callbacks when running the migration.
     *
     * @return $this
     */
    public function withoutCallbacks()
    {
        $this->runCallbacks = false;

        return $this;
    }
}
