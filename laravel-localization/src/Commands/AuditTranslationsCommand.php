<?php

namespace Prismateq\Localization\Commands;

use Prismateq\Localization\Translator;
use Illuminate\Console\Command;

class AuditTranslationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translations:audit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Audit translation files.';

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
        $this->warn('Auditing Translation files.');
        Translator::auditTranslations();
        $this->info('Translation files audited.');
        return 0;
    }
}
