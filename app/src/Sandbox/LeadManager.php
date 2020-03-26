<?php

declare(strict_types=1);

namespace App\Sandbox;

class LeadManager implements LeadManagerInterface
{
    public function build(Command $command): Lead
    {
        $lead = new Lead();
        $lead->email = $command->email;
        $lead->firstName = $command->firstName;
        $lead->lastName = $command->lastName;

        return $lead;
    }
}
