<?php

namespace BernskioldMedia\LaravelPpt\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateNewSlideDeckCommand extends Command
{
    public $signature = 'slide-decks:create {name}';

    public $description = 'Creates a new slide deck class in the slide decks directory.';

    public function handle(): int
    {
        $stub = file_get_contents(__DIR__.'/../../stubs/SlideDeck.stub');

        $replacements = [
            'name' => str($this->argument('name'))->camel(),
        ];

        $stub = str_replace(
            array_map(fn ($key) => '{{'.$key.'}}', array_keys($replacements)),
            array_values($replacements),
            $stub
        );

        $directory = config('ppt.paths.slideDecks').'/'.$replacements['name'];
        $path = $directory.'/'.$replacements['name'].'.php';

        // Create the directory if it doesn't exist.
        Storage::makeDirectory($directory);

        // Write the file.
        Storage::put($path, $stub);

        $this->comment('The slide deck was created.');

        return self::SUCCESS;
    }
}
