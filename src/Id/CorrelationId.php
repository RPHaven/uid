<?php

declare(strict_types=1);

namespace RpHaven\Uid\Id;

use RpHaven\App\Correlation\CorrelationId as AppCorrelationId;
use RpHaven\Uid\Uid;

interface CorrelationId extends Uid, AppCorrelationId
{

}