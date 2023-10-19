<?php

namespace Saade\FilamentExtra\Commands;

use Illuminate\Console\Command;

class FilamentExtraCommand extends Command
{
    public $signature = 'filament-extra';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
