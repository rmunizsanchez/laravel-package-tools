<?php

namespace Vanthao03596\LaravelPackageTools\Tests\TestClasses;

use Illuminate\Console\Command;

class FourthTestCommand extends Command
{
    public $name = 'fourth-test-command';

    public function handle()
    {
        $this->info('output of test command');
    }
}
