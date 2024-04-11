<?php

declare(strict_types=1);

namespace Infra\Uid;

use Infra\Uid\Traits\BinaryUid;
use Infra\Uid\Traits\Rfc4122Uid;
use RpHaven\Games\Branch\Space\SpaceId;
use RpHaven\Games\Traits\ToString;
use Symfony\Component\Uid\UuidV5;

final readonly class SpaceUid implements SpaceId
{
    use BinaryUid;
    use Rfc4122Uid;
    use ToString;

    public const OID = Oid::SPACE;

    public static function create(\RpHaven\Games\Branch\Space $space): self
    {
        return new self(UuidV5::v5(
            self::OID->namespace(),
            sprintf('%s:%s', $space->type()->value, $space->uri)
        ));
    }

    private function __construct(private UuidV5 $uid)
    {
    }

    private function uid(): UuidV5
    {
        return $this->uid;
    }
}
