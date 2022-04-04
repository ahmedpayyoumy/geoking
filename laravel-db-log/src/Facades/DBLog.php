<?php

namespace Prismateq\DBLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void log($level, $type, $subject = null, $data = null, $backtrace = 5);
 * @method static void debug($type, $subject = null, $data = null, $backtrace = 5);
 * @method static void info($type, $subject = null, $data = null, $backtrace = 5);
 * @method static void success($type, $subject = null, $data = null, $backtrace = 5);
 * @method static void error($type, $subject = null, $data = null, $backtrace = 5);
 *
 * @method static string getTimezone();
 * @method static void removeExpired();
 *
 * @method static array getBacktrace();
 *
 * @see \Prismateq\DBLog\Logger
 */

class DBLog extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'db-log';
    }
}
