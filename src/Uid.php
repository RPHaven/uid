<?php

declare(strict_types=1);

namespace RpHaven\Uid;

use RpHaven\Uid\Uid\Type;
use Stringable;

interface Uid extends Stringable
{
    public function toBinary(): string;

    public function toString(): string;

    public function type(): Type;
}
