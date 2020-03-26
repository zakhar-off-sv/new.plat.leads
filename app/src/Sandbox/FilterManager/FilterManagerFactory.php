<?php

declare(strict_types=1);

namespace App\Sandbox\FilterManager;

use App\Sandbox\FilterManager\Filter\TrimFilter;

class FilterManagerFactory
{
    public function getFilterManager(): FilterManager
    {
        return new FilterManager([
            new TrimFilter()
        ]);
    }
}
