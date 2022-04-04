<?php

namespace Prismateq\Supervisor\Commands;

use Illuminate\Console\Command;
use Prismateq\Supervisor\Supervisor;

class GenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supervisor:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate config files of supervisor';

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
     * @return mixed
     */
    public function handle()
    {
        Supervisor::generate($this);
    }
}
