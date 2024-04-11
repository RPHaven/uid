<?php

declare(strict_types=1);

namespace RpHaven\Uid\Factory;

use DateTimeImmutable;
use DateTimeInterface;
use RpHaven\Uid\Id\GameSessionTokenId;
use RpHaven\Uid\Id\MemberId;
use RpHaven\Uid\Uid;
use RpHaven\Uid\Uuid\Id\GameSessionTokenUuid;

final class GameSessionTokenUid implements UidFactory
{

    public function token(
        MemberId $member,
        int $issueNumber,
        DateTimeInterface $issued = new DateTimeImmutable()
    ): GameSessionTokenId {
        return GameSessionTokenUuid::create($member, $issueNumber, DateTimeImmutable::createFromInterface($issued));
    }

    public function binary(string $bytes): Uid
    {
        return GameSessionTokenUuid::fromBinary($bytes);
    }
}