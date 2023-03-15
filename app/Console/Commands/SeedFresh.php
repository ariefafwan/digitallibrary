<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SeedFresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop Tables && Seeder';

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
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->info('Successfully for Tables Fresh & Run Seeder.');
    }
}
