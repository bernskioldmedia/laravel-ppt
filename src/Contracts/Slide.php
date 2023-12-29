<?php

namespace BernskioldMedia\LaravelPpt\Contracts;

use BernskioldMedia\LaravelPpt\Presentation\Presentation;

interface Slide
{

    public function create(Presentation $presentation): \PhpOffice\PhpPresentation\Slide;

    public function raw(): \PhpOffice\PhpPresentation\Slide;

}
