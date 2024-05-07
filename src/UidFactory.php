<?php

declare(strict_types=1);

namespace RpHaven\Uid;

interface UidFactory
{
    public function binary(string $bytes): Uid;

}