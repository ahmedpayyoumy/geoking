<?php

namespace Prismateq\TemporaryFile;

use Spatie\TemporaryDirectory\TemporaryDirectory;

class TemporaryFile
{

    /**
     * Singleton instance.
     *
     * @var static
     */
    private static $_instance;

    /**
     * Set the clone private
     */
    private function __clone()
    {
    }

    /**
     * Get the singleton instance.
     *
     * @return static
     */
    private static function getInstance()
    {
        if (!static::$_instance) static::$_instance = new static();
        return static::$_instance;
    }

    /**
     * TemporaryDirectory instance;
     *
     * @var TemporaryDirectory $temporaryDirectory
     */
    private $temporaryDirectory;

    private function __construct()
    {
        $this->temporaryDirectory = (new TemporaryDirectory())->create();
    }

    private function randomFileName($ext)
    {
        $string = '';
        $length = 16;
        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }
        return $string . '.' . $ext;
    }

    private function createTemporaryFile($ext) {
        return $this->temporaryDirectory->path($this->randomFileName($ext));
    }

    /**
     * Destructor to remove temporary directory.
     */
    public function __destruct()
    {
        try {
            $this->temporaryDirectory->delete();
        } catch (\Exception $e) {
        }
    }

    /**
     * Create a new temporary file with custom extension.
     *
     * @param string $ext
     * @return string
     */
    public static function create(string $ext = 'tmp')
    {
        return static::getInstance()->createTemporaryFile($ext);
    }
}
