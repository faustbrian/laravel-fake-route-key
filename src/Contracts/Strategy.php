<?php

declare(strict_types=1);

namespace PreemStudio\FakeRouteKey\Contracts;

interface Strategy
{
    public function encode(mixed $key): string;

    public function decode(mixed $value): string;
}
