<?php

namespace BernskioldMedia\LaravelPpt;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use BernskioldMedia\LaravelPpt\Commands\LaravelPptCommand;

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
