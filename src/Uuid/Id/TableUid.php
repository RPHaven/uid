<?php

declare(strict_types=1);

namespace Infra\Uid;

use Infra\Uid\Traits\BinaryUid;
use Infra\Uid\Traits\Rfc4122Uid;
use Nyholm\Psr7\Uri;
use RpHaven\Games\Branch\Space\SpaceId;
use RpHaven\Games\Table\TableId;
use RpHaven\Games\Traits\ToString;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV5;

final readonly class TableUid implements TableId
{
    use BinaryUid;
    use Rfc4122Uid;
    use ToString;

    public const OID = Oid::TABLE;

    public static function create(SpaceId $spaceId, \RpHaven\Games\Table $table): self
    {
        return new self(
            Uuid::v5(self::OID->namespace(), sprintf(
                '%s:%s:%s',
                $spaceId,
                $table->lifetime->start()->format(DATE_ATOM),
                $table->lifetime->end()->format(DATE_ATOM),
            ))
        );
    }

    private static function oid(): Uri
    {
        return new Uri(self::OID);
    }

    private function __construct(private UuidV5 $uid)
    {
    }

    private function uid(): UuidV5
    {
        return $this->uid;
    }
}
