<?php

declare(strict_types=1);

namespace App\Sandbox;

class Validation implements ValidationInterface
{
    private $errors = [];

    public function validate(Command $command): bool
    {
        $this->clearErrors();
        return true;
    }

    private function clearErrors(): void
    {
        $this->errors = [];
    }

    public function getErrors(): iterable
    {
        return $this->errors;
    }
}
