<?php

namespace BernskioldMedia\LaravelPpt\Contracts;

use BernskioldMedia\LaravelPpt\Components\Component;
use PhpOffice\PhpPresentation\Shape\RichText\Run;

interface GeneratesTextRun
{
    public function toTextRun(Component $component): Run;
}
