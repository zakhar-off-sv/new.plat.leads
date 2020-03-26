<?php

declare(strict_types=1);

namespace App\Sandbox\Auction;

use App\Sandbox\Command;

interface AuctionInterface
{
    public function run(Command $command): bool;
}
