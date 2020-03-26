<?php

declare(strict_types=1);

namespace App\Sandbox;

interface LeadManagerInterface
{
    public function build(Command $command): Lead;
}
