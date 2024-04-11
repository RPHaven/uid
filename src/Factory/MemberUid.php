<?php

declare(strict_types=1);

namespace RpHaven\Uid\Factory;

use DateTimeInterface;
use RpHaven\Uid\Id\MemberId;
use RpHaven\Uid\Uuid\Id\MemberUuid;

final readonly class MemberUid implements UidFactory
{

    public function member(DateTimeInterface $registration): MemberId
    {
        return MemberUuid::create($registration);
    }

    public function binary(string $bytes): MemberId
    {
        return MemberUuid::fromBinary($bytes);
    }
}