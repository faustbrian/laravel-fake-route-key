<?php

declare(strict_types=1);

namespace BombenProdukt\FakeRouteKey\Concerns;

use Illuminate\Support\Facades\App;
use BombenProdukt\FakeRouteKey\Contracts\Strategy;
use Throwable;

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
        } catch (Throwable) {
            return $query;
        }
    }

    protected function getRouteKeyStrategy(): Strategy
    {
        return App::get(Strategy::class);
    }
}
