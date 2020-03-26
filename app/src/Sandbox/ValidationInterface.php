<?php

declare(strict_types=1);

namespace App\Sandbox;

interface ValidationInterface
{
    public function validate(Command $command): bool;

    public function getErrors(): iterable;
}
