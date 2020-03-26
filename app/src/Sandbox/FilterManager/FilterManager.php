<?php

declare(strict_types=1);

namespace App\Sandbox\FilterManager;

use App\Sandbox\Command;

class FilterManager
{
    private $filters;

    public function __construct(iterable $filters)
    {
        $this->filters = $filters;
    }

    public function process(Command $command): Command
    {
        foreach ($this->filters as $filter) {
            $command = $filter->process($command);
        }
        return $command;
    }
}
