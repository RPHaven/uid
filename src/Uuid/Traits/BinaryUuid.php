<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Traits;

use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;

trait BinaryUuid
{

    public static function fromBinary(string $bytes): self
    {
        return new self(Uuid::fromBinary($bytes));
    }

    public function toBinary(): string
    {
        return $this->uid()->toBinary();
    }

    abstract private function uid(): AbstractUid;
}
