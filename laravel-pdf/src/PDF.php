<?php

namespace Prismateq\PDF;

use Illuminate\Support\Str;
use Prismateq\DirectoryManager\Directory;
use Prismateq\TemporaryFile\TemporaryFile;
use Spatie\Browsershot\Browsershot;

class PDF
{

    /**
     * The instance of Spatie's Browsershot.
     *
     * @var Browsershot
     */
    private $browsershot;


    /**
     * Options for creating PDF.
     *
     * @var array
     */
    private $options;

    /**
     * Set the constructor private and create a new Browsershot instance.
     */
    private function __construct()
    {
        $this->options = config('pdf', []);
        $this->browsershot = new Browsershot();
    }

    /**
     * Set the clone private
     */
    private function __clone()
    {
    }

    /**
     * Check if OS is Windows.
     *
     * @return bool
     */
    private function isWindows()
    {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }

    /**
     * Check from config and disable Sandbox if needed.
     *
     * return void
     */
    private function setSandbox()
    {
        if ($this->options['sandbox'] === null) $this->options['sandbox'] = $this->isWindows();
        if (!$this->options['sandbox']) $this->browsershot->noSandbox();
    }

    /**
     * Configure waiting.
     *
     * return void
     */
    private function setWaiting()
    {
        if (!$this->options['waitingValue']) return;
        if ($this->options['waitingType'] == 'variable') {
            $function = 'window.' . $this->options['waitingValue'];
            $timeout = (int)$this->options['variableWaitingTimeout'];
            if ($timeout > 0) $function .= ' || (new Date()).getTime() > (window._prismateqStart?window._prismateqStart:(window._prismateqStart = (new Date()).getTime() + ' . ($timeout * 1000) . '))';
            $this->browsershot->waitForFunction($function, Browsershot::POLLING_REQUEST_ANIMATION_FRAME);
        }
        if ($this->options['waitingType'] == 'delay') {
            $this->browsershot->setDelay(((int)$this->options['waitingValue']) * 1000);
        }
    }

    /**
     * Set local options to Browsershot.
     */
    private function setOptions()
    {
        $this->browsershot->ignoreHttpsErrors()
            ->setOption('args', $this->options['args'])
            ->setBinPath(__DIR__ . '/../bin/browser.js')
            ->margins($this->options['margins'][0], $this->options['margins'][1], $this->options['margins'][2], $this->options['margins'][3], 'px')
            ->windowSize($this->options['width'], $this->options['minHeight'])
            ->paperSize($this->options['paperSize'][0], $this->options['paperSize'][1])
            ->timeout($this->options['timeout'])
            ->emulateMedia($this->options['media']);
        if ($this->options['pages']) $this->browsershot->pages($this->options['pages']);
        if ($this->options['background']) $this->browsershot->showBackground();
        if ($this->options['format']) $this->browsershot->format($this->options['format']);
        $this->setSandbox();
        $this->setWaiting();
    }

    /**
     * Create the PDF file and save to given path.
     *
     * @param string $filename
     * @return string
     * @throws \Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot
     */
    private function createPdf(string $filename)
    {
        $this->setOptions();
        $this->browsershot->save($filename);
        return $filename;
    }

    /**
     * Create a new PDF instance to screenshot from url.
     *
     * @param string $url
     * @return static
     */
    public static function url(string $url)
    {
        $instance = new static();
        $instance->browsershot->setUrl($url);
        return $instance;
    }

    /**
     * Create a new PDF instance to screenshot from view.
     *
     * @param string $view
     * @param array $data
     * @param bool $addBaseUrl
     * @return static
     */
    public static function view($view, $data = [], $addBaseUrl = true)
    {
        $instance = new static();
        $html = view($view, $data)->render();
        if ($addBaseUrl) $html = str_replace('<head>', '<head><base href="' . e(url('')) . '">', $html);
        $instance->browsershot->setHtml($html);
        return $instance;
    }

    /**
     * Set width of the browser viewport, px.
     *
     * @param int $width
     * @return $this
     */
    public function setWidth(int $width)
    {
        $this->options['width'] = $width;
        return $this;
    }

    /**
     * Set min height of the browser viewport, px.
     *
     * @param int $minHeight
     * @return $this
     */
    public function setMinHeight(int $minHeight)
    {
        $this->options['minHeight'] = $minHeight;
        return $this;
    }

    /**
     * Set timeout for process, seconds.
     *
     * @param int $timeout
     * @return $this
     */
    public function setTimeout(int $timeout)
    {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * Set margins of paper.
     *
     * @param $top
     * @param $left
     * @param $right
     * @param $bottom
     * @return $this
     */
    public function setMargins($top, $left, $right, $bottom)
    {
        $this->options['margins'] = [$top, $left, $right, $bottom];
        return $this;
    }

    /**
     * Set size of paper.
     *
     * @param $width
     * @param $height
     * @return $this
     */
    public function setPaperSize($width, $height)
    {
        $this->options['paperSize'] = [$width, $height];
        return $this;
    }

    /**
     * Set format of paper.
     *
     * @param $format
     * @return $this
     */
    public function setFormat($format) {
        $this->options['format'] = $format;
        return $this;
    }

    /**
     * Set count of pages.
     *
     * @param int $count
     * @return $this
     */
    public function pages($count = 0)
    {
        $this->options['pages'] = $count;
        return $this;
    }

    /**
     * Set background visibility.
     *
     * @param bool $show
     * @return $this
     */
    public function showBackground($show = true)
    {
        $this->options['background'] = (bool)$show;
        return $this;
    }

    /**
     * Set a global variable name to wait until it will not be empty.
     *
     * @param string|null $variable
     * @param int|null $timeoutInSeconds
     * @return $this
     */
    public function waitForVariable(?string $variable = null, ?int $timeoutInSeconds = null)
    {
        $this->options['waitingType'] = 'variable';
        $this->options['waitingValue'] = isset($variable) ? $variable : $this->options['defaultWaitingVariable'];
        $this->options['variableWaitingTimeout'] = (int)(isset($timeoutInSeconds) ? $timeoutInSeconds : config('pdf.variableWaitingTimeout'));
        return $this;
    }

    /**
     * Set a number of seconds to wait before creating PDF.
     *
     * @param int $delayInSeconds
     * @return $this
     */
    public function waitForDelay(int $delayInSeconds)
    {
        $this->options['waitingType'] = 'delay';
        $this->options['waitingValue'] = $delayInSeconds;
        return $this;
    }

    /**
     * Set css media type for page.
     *
     * @param string $media
     * @return $this
     */
    public function setMedia(string $media)
    {
        $this->options['media'] = $media;
        return $this;
    }

    /**
     * Create the PDF in temporary file.
     *
     * @return string
     * @throws \Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot
     */
    public function create()
    {
        return $this->createPdf(TemporaryFile::create('pdf'));
    }

    /**
     * Create the PDF and save.
     *
     * @param string $filename
     * @return bool
     * @throws \Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot
     */
    public function save(string $filename)
    {
        $path = dirname($filename);
        if (!file_exists($path)) Directory::create($path);
        $this->createPdf($filename);
        return true;
    }

    /**
     * Create the PDF and return as a response.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot
     */
    public function inline()
    {
        return response()->file($this->create());
    }

    /**
     * Create the PDF and return a download response/
     *
     * @param string|null $name
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot
     */
    public function download(?string $name = 'document')
    {
        return response()->download($this->create(), Str::finish($name, '.pdf'));
    }
}
