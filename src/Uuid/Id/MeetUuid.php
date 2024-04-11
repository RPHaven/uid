<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Id;

use DateTimeImmutable;
use RpHaven\Uid\Id\BranchId;
use RpHaven\Uid\Id\MeetId;
use RpHaven\Uid\Traits\ToString;
use RpHaven\Uid\Uuid\Traits\BinaryUuid;
use RpHaven\Uid\Uuid\Traits\Rfc4122Uuid;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV6;


final readonly class MeetUuid implements MeetId
{
    use BinaryUuid;
    use Rfc4122Uuid;
    use ToString;

    public static function create(BranchId $branchId, DateTimeImmutable $start): self
    {
        return new self(UuidV6::fromString(UuidV6::generate($start, Uuid::fromString($branchId->toString()))));
    }

    private function __construct(private UuidV6 $uid)
    {
    }

    private function uid(): UuidV6
    {
        return $this->uid;
    }
}
