<?php

namespace Vanthao03596\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Vanthao03596\LaravelPackageTools\Package;
use Spatie\TestTime\TestTime;

class MultiplePackageMigrationsTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        TestTime::freeze('Y-m-d H:i:s', '2020-01-01 00:00:00');

        $package
            ->name('laravel-package-tools')
            ->hasMigrations(['create_laravel_package_tools_table'])
            ->hasMigrations('create_other_laravel_package_tools_table', 'create_third_laravel_package_tools_table');
    }

    /** @test */
    public function it_can_publish_multiple_migrations()
    {
        $this
            ->artisan('vendor:publish --tag=package-tools-migrations')
            ->assertExitCode(0);

        $this->assertFileExists(database_path('migrations/2020_01_01_000001_create_laravel_package_tools_table.php'));
        $this->assertFileExists(database_path('migrations/2020_01_01_000002_create_other_laravel_package_tools_table.php'));
        $this->assertFileExists(database_path('migrations/2020_01_01_000003_create_third_laravel_package_tools_table.php'));
    }
}
