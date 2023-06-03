<?php

namespace BernskioldMedia\LaravelPpt;

use BernskioldMedia\LaravelPpt\Commands\CreateNewSlideCommand;
use BernskioldMedia\LaravelPpt\Commands\CreateNewSlideDeckCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPptServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-ppt')
            ->hasConfigFile('powerpoint')
            ->hasConsoleCommands([
                CreateNewSlideDeckCommand::class,
                CreateNewSlideCommand::class,
            ]);
    }
}
