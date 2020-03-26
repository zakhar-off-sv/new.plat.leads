<?php

declare(strict_types=1);

namespace App\Sandbox\Auction;

interface AuctionFactoryInterface
{
    public function getAuction(): AuctionInterface;
}
