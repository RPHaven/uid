<?php

declare(strict_types=1);

namespace Infra\Uid;


use Nyholm\Psr7\Uri;
use RpHaven\Uid\Id\SpaceId;
use RpHaven\Uid\Traits\ToString;
use RpHaven\Uid\Uuid\Traits\BinaryUuid;
use RpHaven\Uid\Uuid\Traits\Rfc4122Uuid;
use RpHaven\Uid\Uuid\Traits\UuidV6Type;

final readonly class TableUid implements TableId
{
    use BinaryUuid;
    use Rfc4122Uuid;
    use UuidV6Type;
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

}
