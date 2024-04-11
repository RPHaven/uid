<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Id;

use DateTimeImmutable;
use RpHaven\Uid\Id\GameSessionTokenId;
use RpHaven\Uid\Id\MemberId;
use RpHaven\Uid\Traits\ToString;
use RpHaven\Uid\Uuid\Id\Exception\IssueNumberMustBeAPositiveInteger;
use RpHaven\Uid\Uuid\Traits\BinaryUuid;
use RpHaven\Uid\Uuid\Traits\Rfc4122Uuid;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV6;

final readonly class GameSessionTokenUuid implements GameSessionTokenId
{
    use BinaryUuid;
    use Rfc4122Uuid;
    use ToString;

    public static function create(
        MemberId $member,
        int $issueNumber,
        DateTimeImmutable $issueTime = new DateTimeImmutable()
    ): self {
        if ($issueNumber < 1) {
            throw new IssueNumberMustBeAPositiveInteger($issueNumber);
        }

        $issue = Uuid::v5(Uuid::fromString($member->toString()), (string) $issueNumber);

        return new self(Uuidv6::fromString(UuidV6::generate(
            $issueTime,
            $issue
        )));
    }

    private function __construct(private UuidV6 $uid)
    {
    }

    private function uid(): UuidV6
    {
        return $this->uid;
    }
}