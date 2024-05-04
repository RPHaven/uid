<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uuid\Traits;

use RpHaven\Uid\Uuid\Type\Uuid;

trait UuidV6Type
{
    public function type(): Uuid
    {
        return Uuid::VERSION_6;
    }
}