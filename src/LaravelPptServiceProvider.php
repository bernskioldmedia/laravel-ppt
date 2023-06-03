<?php

namespace BernskioldMedia\LaravelPpt;

use BernskioldMedia\LaravelPpt\Commands\LaravelPptCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPptServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-ppt')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-ppt_table')
            ->hasCommand(LaravelPptCommand::class);
    }
}
