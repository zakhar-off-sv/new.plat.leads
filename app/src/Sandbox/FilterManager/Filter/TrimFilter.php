<?php

declare(strict_types=1);

namespace App\Sandbox\FilterManager\Filter;

use App\Sandbox\Command;

class TrimFilter
{
    public function process(Command $command): Command
    {
        $command->email = empty($command->email) ?: trim($command->email);

        return $command;
    }
}
