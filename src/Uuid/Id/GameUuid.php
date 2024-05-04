<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Id;

use DateTimeImmutable;
use RpHaven\Uid\Id\BranchId;
use RpHaven\Uid\Id\GameId;
use RpHaven\Uid\Traits\ToString;
use RpHaven\Uid\Uid\Type;
use RpHaven\Uid\Uuid\Oid;
use RpHaven\Uid\Uuid\Traits\BinaryUuid;
use RpHaven\Uid\Uuid\Traits\Rfc4122Uuid;
use RpHaven\Uid\Uuid\Traits\UuidV5Type;
use Symfony\Component\Uid\UuidV5;
use Symfony\Component\Uid\UuidV6;

final readonly class GameUuid implements GameId
{
    use BinaryUuid;
    use Rfc4122Uuid;
    use UuidV5Type;
    use ToString;

    public const Oid OID = Oid::GAME;

    public static function create(BranchId $branchId, string $gameName, string $system): self
    {
        $node = UuidV5::v5(
            self::OID->namespace(),
            sprintf('%s:%s:%s', $branchId, $gameName, $system),
        );

        return new self(UuidV6::fromString(UuidV6::generate(new DateTimeImmutable(), $node)));
    }

    private function __construct(private UuidV6 $uid)
    {
    }

    private function uid(): UuidV6
    {
        return $this->uid;
    }
}
