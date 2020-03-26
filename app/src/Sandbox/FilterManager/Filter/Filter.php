<?php

declare(strict_types=1);

namespace App\Sandbox\FilterManager\Filter;

use App\Sandbox\Command;

interface Filter
{
    public function process(Command $command): Command;
}
