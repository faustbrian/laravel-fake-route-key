<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use PreemStudio\FakeRouteKey\Concerns\RoutesWithFakeKey;

/**
 * @internal
 */
abstract class TestCase extends Model
{
    use RoutesWithFakeKey;
}
