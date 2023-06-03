<?php

namespace BernskioldMedia\LaravelPpt\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function config;

class CreateNewSlideCommand extends Command
{
    public $signature = 'slide-decks:slide {deck} {name}';

    public $description = 'Creates a new slide in the given slide deck.';

    public function handle(): int
    {
        $stub = file_get_contents(__DIR__ . '/../../stubs/Slide.stub');

        $replacements = [
            'deck' => str($this->argument('deck'))->camel(),
            'name' => str($this->argument('name'))->camel(),
        ];

        $stub = str_replace(
            array_map(fn($key) => '{{' . $key . '}}', array_keys($replacements)),
            array_values($replacements),
            $stub
        );

        $directory = config('ppt.paths.slideDecks') . '/' . $replacements['deck'] . '/' . 'Slides';
        $path = $directory . '/' . $replacements['name'] . '.php';

        // Create the directory if it doesn't exist.
        Storage::makeDirectory($directory);

        // Write the file.
        Storage::put($path, $stub);

        $this->comment("The slide deck was created.");

        return self::SUCCESS;
    }
}
