<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithDataSource
{
    protected bool $showDataSource = false;

    protected string $dataSourceMessage = '';

    public function withDataSource(?string $message = null): static
    {
        $this->showDataSource = true;
        $this->dataSourceMessage = $message ?? '';

        return $this;
    }
}
