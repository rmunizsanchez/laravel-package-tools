<?php

namespace Vanthao03596\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Spatie\TestTime\TestTime;
use Vanthao03596\LaravelPackageTools\Package;

class PackageRoutesTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        TestTime::freeze('Y-m-d H:i:s', '2020-01-01 00:00:00');

        $package
            ->name('laravel-package-tools')
            ->hasRoutes('web', 'other');
    }

    /** @test */
    public function it_can_load_the_route()
    {
        $response = $this->get('my-route');

        $response->assertSeeText('my response');
    }

    /** @test */
    public function it_can_load_multiple_route()
    {
        $adminResponse = $this->get('other-route');

        $adminResponse->assertSeeText('other response');
    }
}
