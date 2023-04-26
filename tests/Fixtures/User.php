<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use BombenProdukt\FakeRouteKey\Concerns\RoutesWithFakeKey;

final class User extends Model
{
    use RoutesWithFakeKey;

    /**
     * @var array<string>|bool
     */
    protected $guarded = [];
}
