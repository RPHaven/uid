<?php

declare(strict_types=1);

namespace Infra\Uid;


use Psr\Http\Message\UriInterface;
use RpHaven\Uid\Id\SpaceId;
use RpHaven\Uid\Traits\ToString;
use RpHaven\Uid\Uuid\Oid;
use RpHaven\Uid\Uuid\Traits\BinaryUuid;
use RpHaven\Uid\Uuid\Traits\Rfc4122Uuid;
use RpHaven\Uid\Uuid\Traits\UuidV6Type;

final readonly class SpaceUid implements SpaceId
{
    use BinaryUuid;
    use Rfc4122Uuid;
    use UuidV6Type;
    use ToString;

    public const OID = Oid::SPACE;

    public static function create(UriInterface $space): self
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
