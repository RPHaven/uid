<?php

declare(strict_types=1);

namespace RpHaven\Uid\Factory;

use DateTimeImmutable;
use RpHaven\Uid\Id\BranchId;
use RpHaven\Uid\Id\MeetId;
use RpHaven\Uid\Uuid\Id\MeetUuid;

final readonly class MeetUid implements UidFactory
{
    public function meet(BranchId $branchId, DateTimeImmutable $start): MeetId
    {
        return MeetUuid::create($branchId, $start);
    }


    public function binary(string $bytes): MeetId
    {
       return MeetUuid::fromBinary($bytes);
    }
}