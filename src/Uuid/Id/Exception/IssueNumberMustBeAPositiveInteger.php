<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Id\Exception;

use InvalidArgumentException;

final class IssueNumberMustBeAPositiveInteger extends InvalidArgumentException implements IdException
{
    public function __construct(public readonly int $issueNumber)
    {
        parent::__construct(sprintf(
            'The issue number must be positive but it was %d',
            $this->issueNumber,
        ));
    }
}