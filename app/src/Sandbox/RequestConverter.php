<?php

declare(strict_types=1);

namespace App\Sandbox;

use Symfony\Component\HttpFoundation\Request;

class RequestConverter implements RequestConverterInterface
{
    public function convert(Request $request): Command
    {
        return new Command();
    }
}
