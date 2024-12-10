<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\FakeRouteKey\Concerns;

use BaseCodeOy\FakeRouteKey\Contracts\Strategy;
use Illuminate\Support\Facades\App;

trait RoutesWithFakeKey
{
    public function getRouteKey()
    {
        return $this->getRouteKeyStrategy()->encode($this->getKey());
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        try {
            return $query->where(
                $field ?? $this->getRouteKeyName(),
                $this->getRouteKeyStrategy()->decode($value),
            );
        } catch (\Throwable) {
            return $query;
        }
    }

    protected function getRouteKeyStrategy(): Strategy
    {
        return App::get(Strategy::class);
    }
}
