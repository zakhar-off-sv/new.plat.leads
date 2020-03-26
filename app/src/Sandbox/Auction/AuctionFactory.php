<?php

declare(strict_types=1);

namespace App\Sandbox\Auction;

class AuctionFactory implements AuctionFactoryInterface
{
    public function getAuction(): AuctionInterface
    {
        return new Auction();
    }
}
