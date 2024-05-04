<?php

declare(strict_types=1);

use RpHaven\Uid\Factory\GameSessionTokenUid;
use RpHaven\Uid\Factory\MemberUid;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';


//var_dump($gameSessionToken1, $gameSessionToken2);
\RpHaven\Uid\Utils\V8::create();