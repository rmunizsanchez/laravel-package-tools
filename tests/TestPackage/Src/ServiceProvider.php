<?php


namespace Vanthao03596\LaravelPackageTools\Tests\TestPackage\Src;

use Closure;
use Vanthao03596\LaravelPackageTools\Package;
use Vanthao03596\LaravelPackageTools\PackageServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    public static $configurePackageUsing = null;

    public function configurePackage(Package $package): void
    {
        $configClosure = self::$configurePackageUsing ?? function (Package $package) {
        };

        ($configClosure)($package);
    }
}
