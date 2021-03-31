<?php


namespace Vanthao03596\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Vanthao03596\LaravelPackageTools\Package;
use Vanthao03596\LaravelPackageTools\Tests\TestCase;
use Vanthao03596\LaravelPackageTools\Tests\TestPackage\Src\ServiceProvider;

abstract class PackageServiceProviderTestCase extends TestCase
{
    public function setUp(): void
    {
        ServiceProvider::$configurePackageUsing = function (Package $package) {
            $this->configurePackage($package);
        };

        parent::setUp();
    }

    abstract public function configurePackage(Package $package);

    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
