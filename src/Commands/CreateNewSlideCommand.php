<?php

namespace BernskioldMedia\LaravelPpt\Commands;

use function config;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function file_put_contents;
use function is_dir;
use function mkdir;

class CreateNewSlideCommand extends Command
{
    public $signature = 'slide-decks:slide {deck} {name}';

    public $description = 'Creates a new slide in the given slide deck.';

    public function handle(): int
    {
        $stub = file_get_contents(__DIR__.'/../../stubs/Slide.stub');

        $replacements = [
            'deck' => str($this->argument('deck'))->camel()->ucfirst(),
            'name' => str($this->argument('name'))->camel()->ucfirst(),
        ];

        $stub = str_replace(
            array_map(fn ($key) => '{{ $'.$key.' }}', array_keys($replacements)),
            array_values($replacements),
            $stub
        );

        $directory = config('ppt.paths.slideDecks').'/'.$replacements['deck'].'/'.'Slides';
        $path = $directory.'/'.$replacements['name'].'.php';

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
