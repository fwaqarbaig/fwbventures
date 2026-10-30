<?php

namespace App\Console\Commands;

use App\Services\LegacyDataCleaner;
use Illuminate\Console\Command;

class CleanLegacyDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fwb:clean-legacy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge obsolete generator/chiller/UAE template data (redirects, products, draft pages, categories, and posts).';

    /**
     * Execute the console command.
     */
    public function handle(LegacyDataCleaner $cleaner): int
    {
        $this->info('Cleaning legacy UAE Generator & Chiller template data...');

        $results = $cleaner->run();

        $this->table(
            ['Entity', 'Removed Count'],
            [
                ['Redirect Rules (Generators/Chillers/UAE)', $results['redirects']],
                ['Products (Generator Fleet Models)', $results['products']],
                ['Pages (Generator/Chiller Draft Pages)', $results['pages']],
                ['Posts (Generator/Chiller Draft Posts)', $results['posts']],
                ['Categories (Generator/Rental/Chiller Categories)', $results['categories']],
            ]
        );

        $this->info('✓ Cleanup completed successfully! FWB Ventures database is clean.');

        return Command::SUCCESS;
    }
}
