<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BombenProdukt\FakeRouteKey\Concerns\RoutesWithFakeKey;
use Illuminate\Database\Eloquent\Model;

final class User extends Model
{
    use RoutesWithFakeKey;

    /**
     * @var array<string>|bool
     */
    protected $guarded = [];
}
