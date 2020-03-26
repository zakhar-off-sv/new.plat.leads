<?php

declare(strict_types=1);

namespace App\Sandbox;

interface LeadRepositoryInterface
{
    public function add(Lead $lead): void;
}
