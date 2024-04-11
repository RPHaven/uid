<?php

declare(strict_types=1);

namespace Infra\Uid;

use DateTimeImmutable;
use Psr\Http\Message\UriInterface;
use RpHaven\Games\Branch\BranchId;
use RpHaven\Games\Branch\Space as SpaceAlias;
use RpHaven\Games\Branch\Space\SpaceId;
use RpHaven\Games\Game\GameId;
use RpHaven\Games\Game\System;
use RpHaven\Games\Interface\Uid;
use RpHaven\Games\Meet\MeetId;
use RpHaven\Games\Session\SessionId;

final readonly class UidFactory
{
    public function branch(UriInterface $uri): BranchId
    {
        return BranchUid::create($uri);
    }

    public function meet(BranchId $branchId, DateTimeImmutable $start): MeetId
    {
        return MeetUid::create($branchId, $start);
    }

    public function game(BranchId $branchId, string $gameName, System $system): GameId
    {
        return GameUid::create($branchId, $gameName, $system);
    }

    public function session(GameId $gameId, MeetId $meetId, DateTimeImmutable $start): SessionId
    {
        return SessionUid::create($gameId, $meetId, $start);
    }

    public function space(SpaceAlias $space): SpaceId
    {
        return SpaceUid::create($space);
    }

    public function binary(string $bytes, Oid $oid): Uid
    {
        return match ($oid) {
            Oid::GAME => GameUid::fromBinary($bytes),
            Oid::BRANCH => BranchUid::fromBinary($bytes),
            Oid::SESSION => SessionUid::fromBinary($bytes),
            Oid::TABLE => TableUid::fromBinary($bytes),
            Oid::SPACE => SpaceUid::fromBinary($bytes),
            Oid::MEET => MeetUid::fromBinary($bytes),
        };
    }
}
