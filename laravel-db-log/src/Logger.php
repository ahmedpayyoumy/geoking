<?php

namespace Prismateq\DBLog;

use Illuminate\Support\Facades\Facade;
use Prismateq\DBLog\Models\Log;
use Exception;
use ReflectionClass;

/**
 * @method void debug($type, $subject = null, $data = null, $backtrace = 5);
 * @method void info($type, $subject = null, $data = null, $backtrace = 5);
 * @method void success($type, $subject = null, $data = null, $backtrace = 5);
 * @method void error($type, $subject = null, $data = null, $backtrace = 5);
 */

class Logger
{
    private $configs;

    private function config($key, $default = null)
    {
        if (!$this->configs) $this->configs = config('db-log');
        if ($key) return $this->configs[$key] ?? $default;
        return $this->configs;
    }

    private function getType($type)
    {
        return in_array($type, $this->config('types')) ? $type : null;
    }


    public function getBacktrace($size = null)
    {
        if ($size === null) $size = $this->config('default_backtrace_size', 0);
        if ($size < 1) return null;
        $basePath = base_path() . '/';
        $reflectionClass = new ReflectionClass(Facade::class);
        $facadeClassFilename = $reflectionClass->getFileName();
        $backtrace = collect(debug_backtrace())->filter(function($item) use ($facadeClassFilename) {
            $file = $item['file'] ?? '';
            return $file != __FILE__ && ($facadeClassFilename != $file || ($item['class'] ?? '') != __CLASS__);
        });
        if ($size !== true) $backtrace = $backtrace->take($size);
        return $backtrace->map(function ($item) use ($basePath) {
            return str_replace($basePath, '', $item['file'] ?? '') . ':' . ($item['line'] ?? 0);
        })->values()->all();
    }

    public function log($level, $type, $subject = null, $data = null, $backtrace = null)
    {
        try {
            Log::add($level, $this->getType($type), $subject, $data, $this->getBacktrace($backtrace));
        } catch (\Exception $exception) {
            Log::add('error', $this->getType('logger'), 'Error from Logger', [
                'message' => $exception->getMessage(),
            ], $this->getBacktrace());
        }
    }

    public function removeExpired()
    {
        $expiration = (int) $this->config('expiration');
        if ($expiration < 1) return;
        $dateTime = now($this->getTimezone())->subDays($expiration);
        Log::deleteOlder((string) $dateTime);
    }

    public function getTimezone() {
        return $this->config('timezone', config('app.timezone', 'UTC'));
    }

    /**
     * @throws Exception
     */
    public function __call($method, $arguments)
    {
        if (in_array($method, $this->config('levels'))) {
            $this->log($method, ...$arguments);
            return;
        }
        throw new Exception('Unknown method "'.$method.'"');
    }
}
