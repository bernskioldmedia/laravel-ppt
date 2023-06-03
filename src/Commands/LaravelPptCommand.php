<?php

namespace BernskioldMedia\LaravelPpt\Commands;

use Illuminate\Console\Command;

class LaravelPptCommand extends Command
{
    public $signature = 'laravel-ppt';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
