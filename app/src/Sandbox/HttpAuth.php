<?php

declare(strict_types=1);

namespace App\Sandbox;

use Symfony\Component\HttpFoundation\Request;

class HttpAuth implements HttpAuthInterface
{
    public function isAuth(Request $request): bool
    {
        return true;
    }
}
