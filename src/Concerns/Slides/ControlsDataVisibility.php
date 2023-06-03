<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait ControlsDataVisibility
{
    protected bool $showDataLabels = false;

    protected bool $showDataValues = true;

    public function withDataLabels(bool $show = true): static
    {
        $this->showDataLabels = $show;

        return $this;
    }

    public function withoutDataLabels(bool $hide = true): static
    {
        $this->withDataLabels(! $hide);

        return $this;
    }

    public function withDataValues(bool $show = true): static
    {
        $this->showDataValues = $show;

        return $this;
    }

    public function withoutDataValues(bool $hide = true): static
    {
        $this->withDataValues(! $hide);

        return $this;
    }
}
