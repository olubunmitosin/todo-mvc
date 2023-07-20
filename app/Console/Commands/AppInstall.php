<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class AppInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install application';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->call('db:wipe');

        $this->call('migrate', ['--force' => true]);

        $this->call('db:seed', ['--force' => true]);

        return CommandAlias::SUCCESS;
    }
}
