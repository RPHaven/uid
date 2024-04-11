<?php

declare(strict_types=1);

use RpHaven\Uid\Factory\GameSessionTokenUid;
use RpHaven\Uid\Factory\MemberUid;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$memberUid = (new MemberUid())->member(new DateTimeImmutable());

$now = new DateTimeImmutable();

$gameSessionToken1 = (new GameSessionTokenUid())->token($memberUid, 1, $now);
$gameSessionToken2 = (new GameSessionTokenUid())->token($memberUid, 2, $now);
var_dump($gameSessionToken1, $gameSessionToken2);
