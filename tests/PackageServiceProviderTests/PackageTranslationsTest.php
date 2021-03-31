<?php

namespace Vanthao03596\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Vanthao03596\LaravelPackageTools\Package;

class PackageTranslationsTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasTranslations();
    }

    /** @test */
    public function it_can_load_the_translations()
    {
        $this->assertEquals('translation', trans('package-tools::translations.translatable'));
    }

    /** @test */
    public function it_can_publish_the_translations()
    {
        $this
            ->artisan('vendor:publish --tag=package-tools-translations')
            ->assertExitCode(0);

        $this->assertFileExists(resource_path('lang/vendor/package-tools/en/translations.php'));
    }
}
