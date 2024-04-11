<?php

declare(strict_types=1);

namespace Infra\Uid;

use DateTimeImmutable;
use Infra\Uid\Traits\BinaryUid;
use Infra\Uid\Traits\Rfc4122Uid;
use Psr\Http\Message\UriInterface;
use RpHaven\Games\Game\GameId;
use RpHaven\Games\Meet\MeetId;
use RpHaven\Games\Session\SessionId;
use RpHaven\Games\Traits\ToString;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV6;

final readonly class SessionUid implements SessionId
{
    use BinaryUid;
    use Rfc4122Uid;
    use ToString;

    public const OID = Oid::SESSION;

    public static function create(GameId $gameId, MeetId $meetId, DateTimeImmutable $start): self
    {
        $node = Uuid::v5(
            Uuid::fromBinary($gameId->toBinary()),
            $meetId->toString(),
        );

        return new self(UuidV6::fromString(UuidV6::generate($start, $node)));
    }

    public static function fromBinary(string $bytes): self
    {
        return new self(UuidV6::fromBinary($bytes));
    }

    private function __construct(private UuidV6 $sessionId)
    {
    }

    private function uid(): AbstractUid
    {
        return $this->sessionId;
    }
}
