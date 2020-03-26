<?php

declare(strict_types=1);

namespace App\Sandbox;

use Symfony\Component\HttpFoundation\Request;

interface RequestConverterInterface
{
    public function convert(Request $request): Command;
}
