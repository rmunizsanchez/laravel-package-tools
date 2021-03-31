<?php

namespace Vanthao03596\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Spatie\TestTime\TestTime;
use Vanthao03596\LaravelPackageTools\Package;

class PackageMigrationTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        TestTime::freeze('Y-m-d H:i:s', '2020-01-01 00:00:00');

        $package
            ->name('laravel-package-tools')
            ->hasMigration('create_another_laravel_package_tools_table');
    }

    /** @test */
    public function it_can_publish_the_migration()
    {
        $this
            ->artisan('vendor:publish --tag=package-tools-migrations')
            ->assertExitCode(0);

        $this->assertFileExists(database_path('migrations/2020_01_01_000001_create_another_laravel_package_tools_table.php'));
    }
}
