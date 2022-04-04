<?php

namespace Prismateq\Localization\Commands;

use Illuminate\Console\Command;
use Prismateq\DirectoryManager\Directory;

class OverrideModelLocalizationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'localization:override-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy model stub file with Localization trait used to stubs path.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = base_path('stubs/model.stub');
        if (file_exists($path) && !$this->confirm('File stubs/model.stub already exists, override?')) {
            $this->warn('Command canceled by the user.');
            return 1;
        }
        Directory::copy(__DIR__ . '/../../stubs/model.stub', $path, true);
        $this->info('Stub file copied successfully.');
        return 0;
    }
}
