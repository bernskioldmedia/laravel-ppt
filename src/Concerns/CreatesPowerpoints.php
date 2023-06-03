<?php

namespace BernskioldMedia\LaravelPpt\Concerns;

trait CreatesPowerpoints
{

    public function powerpointCreatorName(): string
    {
        return $this->name;
    }

    public function powerpointCompanyName(): string
    {
        return '';
    }

}
