<?php

namespace Prismateq\DBLog\Commands;

use Illuminate\Console\Command;
use Prismateq\DBLog\Facades\DBLog;

class RemoveExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db-log:remove-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove expired db logs from database.';

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
     * @return void
     */
    public function handle()
    {
        $this->warn('Removing expired logs.');
        DBLog::removeExpired();
        $this->info('Expired logs have been successfully removed.');
    }
}
