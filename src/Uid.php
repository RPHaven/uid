<?php

declare(strict_types=1);

namespace RpHaven\Uid;

use Stringable;

interface Uid extends Stringable
{
    public function toBinary(): string;

    public function toString(): string;
}
