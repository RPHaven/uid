<?php

declare(strict_types=1);

namespace RpHaven\Uid\Factory;

use RpHaven\Uid\Uid;

interface UidFactory
{
    public function binary(string $bytes): Uid;
}