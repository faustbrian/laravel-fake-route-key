<?php

declare(strict_types=1);

namespace BaseCodeOy\FakeRouteKey\Contracts;

interface Strategy
{
    public function encode(mixed $key): string;

    public function decode(mixed $value): string;
}
