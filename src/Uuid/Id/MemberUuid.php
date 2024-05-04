<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Id;

use DateTimeInterface;
use RpHaven\Uid\Id\MemberId;
use RpHaven\Uid\Traits\ToString;
use RpHaven\Uid\Uuid\Id\Exception\NodeMismatch;
use RpHaven\Uid\Uuid\Oid;
use RpHaven\Uid\Uuid\Traits\BinaryUuid;
use RpHaven\Uid\Uuid\Traits\Rfc4122Uuid;
use RpHaven\Uid\Uuid\Traits\UuidV6Type;
use Symfony\Component\Uid\UuidV6;

final readonly class MemberUuid implements MemberId
{
    use BinaryUuid;
    use Rfc4122Uuid;
    use UuidV6Type;
    use ToString;

    public const Oid OID = Oid::MEMBER;

    public static function create(DateTimeInterface $registration): self
    {
        return new self(UuidV6::fromString(UuidV6::generate($registration, self::OID->namespace())));
    }

    private function __construct(private UuidV6 $uid)
    {
        $node = self::OID->node();
        if ($this->uid->getNode() !== $node) {
            throw new NodeMismatch($uid, $node);
        }
    }

    private function uid(): UuidV6
    {
        return $this->uid;
    }
}