<?php

namespace Prismateq\DirectoryManager;

use RuntimeException;

class Directory
{
    /**
     * Scan a directory.
     *
     * @param $path
     * @param string $type
     * @return array
     */
    public static function scan($path, $type = 'all')
    {
        $path = preg_replace('/(?:\/)+$/u', '', $path) . '/';
        if (!in_array($type, ['all', 'file', 'dir', 'separate'])) throw new RuntimeException('Type must be file, dir, all or separate.');
        $result = array_values(array_diff(scandir($path), ['.', '..']));
        if ($type != 'all') {
            if ($type == 'separate') $filteredResult = ['files' => [], 'dirs' => []];
            else $filteredResult = [];
            foreach ($result as $file) {
                if (is_dir($path . $file)) {
                    if ($type == 'dir') $filteredResult[] = $file;
                    elseif ($type == 'separate') $filteredResult['dirs'][] = $file;
                } else {
                    if ($type == 'file') $filteredResult[] = $file;
                    elseif ($type == 'separate') $filteredResult['files'][] = $file;
                }
            }
            return $filteredResult;
        }
        return $result;
    }

    /**
     * Force remove files|directories.
     *
     * @param $files
     * @param null $path
     * @return bool
     */
    public static function delete($files, $path = null)
    {
        if (!is_array($files)) $files = [$files];
        elseif (empty($files)) return true;
        if ($path) $path = $path = preg_replace('/(?:\/)+$/u', '', $path) . '/';
        foreach ($files as $file) {
            $filename = $path ? ($path . (in_array(substr($file, 0, 1), ['\\', '/']) ? substr($file, 1) : $file)) : $file;
            if (file_exists($filename)) {
                if (is_file($filename)) unlink($filename);
                else {
                    static::delete(static::scan($filename), $filename);
                    rmdir($filename);
                }
            }
        }
        return true;
    }

    /**
     * Create new directory.
     *
     * @param $path
     * @param int $mode
     * @return bool
     */
    public static function create($path, $mode = 0775)
    {
        return mkdir($path, $mode, true);
    }

    /**
     * Copy file/directory.
     *
     * @param string $target
     * @param string $path
     * @param bool $override
     * @return bool
     */
    public static function copy(string $target, string $path, $override = false)
    {
        $destination = dirname($path);
        if (file_exists($path))
            if (!$override) return false;
            else static::delete($path);
        if (!file_exists($destination)) static::create($destination);
        if (is_dir($target)) {
            if (!in_array(!substr($path, -1, 1), ['/', '\/'])) $path .= '/';
            if (!in_array(!substr($target, -1, 1), ['/', '\/'])) $target .= '/';
            static::create($path);
            foreach (static::scan($target) as $subFile) {
                static::copy($target . $subFile, $path . $subFile);
            }
        } else if (!copy($target, $path)) throw new RuntimeException('Unable to copy the file/directory.');
        return true;
    }

    /**
     * Move file/directory.
     *
     * @param string $target
     * @param string $path
     * @param bool $override
     */
    public static function move(string $target, string $path, $override = false)
    {
        $destination = dirname($path);
        if (file_exists($path))
            if (!$override) return false;
            else static::delete($path);
        if (!file_exists($destination)) static::create($destination);
        if (!rename($target, $path)) throw new RuntimeException('Unable to move the file/directory.');
        return true;
    }
}
