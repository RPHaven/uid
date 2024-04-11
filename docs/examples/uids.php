<?php

declare(strict_types=1);

use RpHaven\Uid\Factory\MemberUid;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$memberUid = (new MemberUid())->member(new DateTimeImmutable());
