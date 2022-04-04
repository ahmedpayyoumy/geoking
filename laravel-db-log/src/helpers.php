<?php

use Prismateq\DBLog\Logger;

if (!function_exists('db_log')) {
    /**
     * @return Logger
     */
    function db_log()
    {
        return app('db-log');
    }
}
