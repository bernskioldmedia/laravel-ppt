<?php

namespace BernskioldMedia\LaravelPpt\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function array_keys;
use function array_map;
use function array_values;
use function config;
use function file_get_contents;
use function file_put_contents;
use function is_dir;
use function mkdir;
use function str;
use function str_replace;

class CreateNewSlideDeckCommand extends Command
{
    public $signature = 'slide-decks:create {name}';

    public $description = 'Creates a new slide deck class in the slide decks directory.';

    public function handle(): int
    {
        $stub = file_get_contents(__DIR__ . '/../../stubs/SlideDeck.stub');

        $replacements = [
            'name' => str($this->argument('name'))->camel()->ucfirst(),
        ];

        $stub = str_replace(
            array_map(fn($key) => '{{ $' . $key . ' }}', array_keys($replacements)),
            array_values($replacements),
            $stub
        );

        $directory = config('ppt.paths.slideDecks') . '/' . $replacements['name'];
        $path = $directory . '/' . $replacements['name'] . '.php';

        // Create the directory if it doesn't exist.
        if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
            $this->error('Directory was not created.');
            return self::FAILURE;
        }

        // Write the file.
        file_put_contents($path, $stub);

        $this->comment('The slide deck was created.');

        return self::SUCCESS;
    }
}
