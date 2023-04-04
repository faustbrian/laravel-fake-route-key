<?php

declare(strict_types=1);

namespace PreemStudio\FakeRouteKey\Concerns;

use Illuminate\Support\Facades\App;
use PreemStudio\FakeRouteKey\Contracts\Strategy;
use Throwable;

trait RoutesWithFakeKey
{
    public function getRouteKey()
    {
        return App::make(Strategy::class)->encode($this->getKey());
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        try {
            return $query->where(
                $field ?? $this->getRouteKeyName(),
                App::make(Strategy::class)->decode($this->getKey()),
            );
        } catch (Throwable) {
            return $query;
        }
    }
}
