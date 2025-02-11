<?php

namespace Vanthao03596\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Vanthao03596\LaravelPackageTools\Package;

class PackageNameTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package->name('laravel-package-tools');
    }

    /** @test */
    public function it_will_not_blow_up_when_a_name_is_set()
    {
        $this->assertTrue(true);
    }
}
