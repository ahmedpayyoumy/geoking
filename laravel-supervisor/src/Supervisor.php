<?php

namespace Prismateq\Supervisor;

use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class Supervisor
{
    private $console;

    private function __construct($console)
    {
        $this->console = $console;
    }

    private function __clone()
    {
    }

    private function config($key, $default = null)
    {
        return config('supervisor.' . $key, $default);
    }

    private function throwError($message)
    {
        $this->console->error($message);
        die;
    }

    private function validateRequirements()
    {
        if (strtoupper(substr(PHP_OS, 0, 5)) !== 'LINUX') $this->throwError('Unsupported OS.');
        if (!is_writable('/etc')) $this->throwError('Please run the command with root access.');
        if (!file_exists($this->config('config_path'))) $this->throwError('Supervisor config path does not exist.');
    }

    private function cleanConfigs()
    {
        $path = $this->config('config_path');
        $prefix = $this->config('prefix');
        $prefixLength = strlen($prefix);
        $configs = scandir($path);
        foreach ($configs as $config) {
            if (substr($config, 0, $prefixLength) == $prefix) unlink($path . '/' . $config);
        }
    }

    private function createConfigs()
    {
        $commands = $this->config('commands');
        foreach ($commands as $name => $data) {
            $this->createConfig($name, $data);
        }
    }

    private function createConfig($name, $data)
    {
        $programName = $this->config('prefix') . '-' . Str::slug($name);
        $params = $this->config('defaults');
        foreach ($data as $key => $value) {
            $params[$key] = $value;
        }
        if (empty($params['enabled'])) return;
        unset($params['enabled']);
        if (array_key_exists('artisan', $params)) {
            if ($params['artisan']) $params['command'] = $this->config('php_bin') . ' ' . base_path('artisan') . ' ' . ($params['command'] ?? '');
            unset($params['artisan']);
        }
        $string = '[program:' . $programName . ']';
        foreach ($params as $key => $param) {
            $string .= "\r\n" . $key . '=' . $param;
        }
        file_put_contents($this->config('config_path') . '/' . $programName . '.' . $this->config('config_ext'), $string);
    }

    private function restartService()
    {
        if ($this->console->confirm('Do you want to restart the service?', false)) {
            Process::fromShellCommandline('systemctl restart ' . $this->config('service_name'))->mustRun();
            $this->console->info('Service has been successfully restarted.');
        } else {
            $this->console->warn('Please restart the service manually to load configuration files.');
        }
    }

    private function generateSupervisorConfig()
    {
        $this->validateRequirements();
        $this->cleanConfigs();
        $this->createConfigs();
        $this->console->info('Supervisor configuration files has been successfully generated.');
        $this->restartService();
    }

    public static function generate($console)
    {
        (new self($console))->generateSupervisorConfig();
    }
}
