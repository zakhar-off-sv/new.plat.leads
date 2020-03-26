<?php

declare(strict_types=1);

namespace App\Sandbox\Auction;

use App\Sandbox\Command;

class Auction implements AuctionInterface
{
    public function run(Command $command): bool
    {
        return false;
    }
}
