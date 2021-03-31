<?php

namespace Vanthao03596\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Vanthao03596\LaravelPackageTools\Package;

class PackageViewComposerTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasViews()
            ->hasViewComposer('*', function ($view) {
                $view->with('sharedItemTest', 'hello world');
            });
    }

    /** @test */
    public function it_can_load_the_view_composer_and_render_shared_data()
    {
        $content = view('package-tools::shared-data')->render();

        $this->assertStringStartsWith('hello world', $content);
    }
}
