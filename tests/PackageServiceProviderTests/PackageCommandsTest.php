<?php

namespace Vanthao03596\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Vanthao03596\LaravelPackageTools\Package;
use Vanthao03596\LaravelPackageTools\Tests\TestClasses\FourthTestCommand;
use Vanthao03596\LaravelPackageTools\Tests\TestClasses\OtherTestCommand;
use Vanthao03596\LaravelPackageTools\Tests\TestClasses\TestCommand;
use Vanthao03596\LaravelPackageTools\Tests\TestClasses\ThirdTestCommand;

class PackageCommandsTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasCommand(TestCommand::class)
            ->hasCommands([OtherTestCommand::class])
            ->hasCommands(ThirdTestCommand::class, FourthTestCommand::class);
    }

    /** @test */
    public function it_can_execute_a_registered_commands()
    {
        $this
            ->artisan('test-command')
            ->assertExitCode(0);

        $this
            ->artisan('other-test-command')
            ->assertExitCode(0);
    }
}
