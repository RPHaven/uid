<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Id;

use Psr\Http\Message\UriInterface;
use RpHaven\Uid\Id\BranchId;
use RpHaven\Uid\Traits\ToString;
use RpHaven\Uid\Uuid\Oid;
use RpHaven\Uid\Uuid\Traits\BinaryUuid;
use RpHaven\Uid\Uuid\Traits\Rfc4122Uuid;
use Symfony\Component\Uid\UuidV5;

final readonly class BranchUuid implements BranchId
{
    use BinaryUuid;
    use Rfc4122Uuid;
    use ToString;

    public const OID = Oid::BRANCH;

    public static function create(UriInterface $uri): self
    {
        return new self(UuidV5::v5(self::OID->namespace(), (string) $uri));
    }

    private function __construct(private UuidV5 $uid)
    {
    }

    private function uid(): UuidV5
    {
        return $this->uid;
    }
}
