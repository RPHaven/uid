<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Traits;

use RpHaven\Uid\Uuid\Type\Uuid;

trait UuidV5Type
{
    public function type(): Uuid
    {
        return Uuid::VERSION_5;
    }
}