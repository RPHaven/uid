<?php

declare(strict_types=1);

namespace RpHaven\Uid\Uid;

interface Type
{
    public function name(): string;

    public function version(): ?string;
}