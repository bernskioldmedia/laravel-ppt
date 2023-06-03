<?php

namespace BernskioldMedia\LaravelPpt;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use BernskioldMedia\LaravelPpt\Commands\CreateNewSlideDeckCommand;

class LaravelPptServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-ppt')
            ->hasConfigFile()
            ->hasCommand(CreateNewSlideDeckCommand::class);
    }
}
