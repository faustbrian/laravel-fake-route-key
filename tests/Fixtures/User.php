<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Fixtures;

use BaseCodeOy\FakeRouteKey\Concerns\RoutesWithFakeKey;
use Illuminate\Database\Eloquent\Model;

final class User extends Model
{
    use RoutesWithFakeKey;

    /** @var array<string>|bool */
    protected $guarded = [];
}
