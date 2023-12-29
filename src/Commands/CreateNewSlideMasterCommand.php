<?php

namespace BernskioldMedia\LaravelPpt\Commands;

use function config;
use function file_put_contents;
use Illuminate\Console\Command;
use function is_dir;
use function mkdir;

class CreateNewSlideMasterCommand extends Command
{
    public $signature = 'make:slide-master {name}';

    public $description = 'Creates a new slide master.';

    public function handle(): int
    {
        $stub = file_get_contents(__DIR__.'/../../stubs/SlideMaster.stub');

        $replacements = [
            'name' => str($this->argument('name'))->camel()->ucfirst(),
        ];

        $stub = str_replace(
            array_map(fn ($key) => '{{ $'.$key.' }}', array_keys($replacements)),
            array_values($replacements),
            $stub
        );

        $directory = config('powerpoint.paths.slideMasters');
        $path = $directory.'/'.$replacements['name'].'.php';

        // Create the directory if it doesn't exist.
        if (! is_dir($directory) && ! mkdir($directory, 0755, true) && ! is_dir($directory)) {
            $this->error('Directory was not created.');

            return self::FAILURE;
        }

        // Write the file.
        file_put_contents($path, $stub);

        $this->comment('The slide master was created.');

        return self::SUCCESS;
    }
}
